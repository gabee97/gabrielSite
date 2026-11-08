<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['mail.from.address' => 'authenticated@example.com', 'mail.from.name' => 'Portfolio']);
    }

    public function test_public_pages_and_metadata_in_both_languages(): void
    {
        foreach (['pt', 'en'] as $locale) {
            foreach (['' => 'home', '/skills' => 'skills', '/experiences' => 'experiences', '/about' => 'about', '/contacts' => 'contacts', '/resume' => 'resume'] as $suffix => $name) {
                $response = $this->get('/'.$locale.$suffix)->assertOk();
                $response->assertSee('hreflang="pt-BR"', false)->assertSee('hreflang="en"', false);
                $response->assertSee('href="https://gbr.dev.br/'.$locale.$suffix.'"', false);
                $response->assertDontSee('portfolio.')->assertDontSee('messages.');
                $response->assertSee('/'.($locale === 'pt' ? 'en' : 'pt').$suffix, false);
            }
        }
        $this->get('/en')->assertSee('Senior Full Stack Developer');
        $this->get('/pt')->assertSee('Desenvolvedor Full Stack Sênior');
        $this->get('/fr')->assertNotFound();
    }

    public function test_home_resume_download_matches_locale_and_preserves_hero_actions(): void
    {
        foreach (['pt' => ['PT', 'Baixar currículo', 'Ver projetos'], 'en' => ['EN', 'Download résumé', 'View projects']] as $locale => [$suffix, $label, $projects]) {
            // Opposite session language must never affect the shared URL's PDF.
            $response = $this->withSession(['locale' => $locale === 'pt' ? 'en' : 'pt_BR'])
                ->get('https://gbr.dev.br/'.$locale)->assertOk();
            $document = new \DOMDocument();
            @$document->loadHTML('<?xml encoding="UTF-8">'.$response->getContent());
            $xpath = new \DOMXPath($document);
            $buttons = $xpath->query('//div[@class="hero-actions"]/a');
            $this->assertCount(4, $buttons);
            $this->assertSame([$projects, $label, 'LinkedIn', 'GitHub'], array_map(
                fn ($button) => trim($button->textContent), iterator_to_array($buttons)
            ));
            $filename = 'Gabriel Oliveira de Paula - '.$suffix.'.pdf';
            $download = $buttons->item(1);
            $url = $download->getAttribute('href');
            $this->assertSame('https', parse_url($url, PHP_URL_SCHEME));
            $this->assertSame('/files/'.rawurlencode($filename), parse_url($url, PHP_URL_PATH));
            $this->assertSame($filename, $download->getAttribute('download'));
            $this->assertStringContainsString('btn-outline-light', $download->getAttribute('class'));
            $this->assertStringContainsString('btn-primary', $buttons->item(0)->getAttribute('class'));
            $this->assertSame('true', $xpath->query('.//i', $download)->item(0)->getAttribute('aria-hidden'));
            $this->assertSame('/'.($locale === 'pt' ? 'en' : 'pt'), parse_url(
                $xpath->query('//a[@aria-label="'.($locale === 'pt' ? 'English' : 'Português').'"]')->item(0)->getAttribute('href'), PHP_URL_PATH
            ));
        }
    }

    public function test_legacy_redirects_and_language_do_not_depend_on_session(): void
    {
        foreach (['', '/skills', '/experiences', '/about', '/contacts'] as $suffix) {
            $this->get($suffix ?: '/')->assertStatus(301)->assertRedirect('/pt'.$suffix);
        }
        $this->get('/lang/en')->assertRedirect('/en');
        $this->get('/lang/pt_BR')->assertRedirect('/pt');
        $this->get('/lang/fr')->assertNotFound();
        $this->withSession(['locale' => 'pt_BR'])->get('/en/contacts')->assertSee('Sending message');
    }

    public function test_sitemap_contains_only_public_localized_pages(): void
    {
        $response = $this->get('/sitemap.xml')->assertOk()->assertHeader('Content-Type', 'application/xml');
        $xml = simplexml_load_string($response->getContent());
        $this->assertNotFalse($xml);
        $this->assertCount(12, $xml->url);
        $response->assertSee('https://gbr.dev.br/en/skills')->assertDontSee('send-email')->assertDontSee('/lang/');
    }

    public function test_csrf_is_required_on_contact_posts(): void
    {
        Mail::fake();
        $this->app->bind(\App\Http\Middleware\VerifyCsrfToken::class, function ($app) {
            return new class($app, $app['encrypter']) extends \App\Http\Middleware\VerifyCsrfToken {
                protected function runningUnitTests() { return false; }
            };
        });
        $this->post('/pt/send-email', $this->validData())->assertStatus(419);
        $this->withSession(['_token' => 'test-csrf-token'])->post('/pt/send-email', array_merge($this->validData(), ['_token' => 'test-csrf-token']))->assertStatus(302)->assertSessionHas('success');
        Mail::assertSent(ContactMessage::class, 1);
    }

    private function validData(): array
    {
        return ['name' => 'Visitor Name', 'email' => 'visitor@example.org', 'phone' => '+55 41 99999-9999', 'message' => 'Hello <script>alert(1)</script> & welcome', 'website' => ''];
    }

    public function test_valid_contact_uses_authenticated_sender_and_reply_to(): void
    {
        Mail::fake();
        $data = $this->validData();
        $this->from('/en/contacts')->post('/en/send-email', $data)->assertRedirect('/en/contacts')->assertSessionHas('success');
        Mail::assertSent(ContactMessage::class, function ($mail) use ($data) {
            $mail->build();
            $this->assertSame('authenticated@example.com', $mail->from[0]['address']);
            $this->assertSame($data['email'], $mail->replyTo[0]['address']);
            $this->assertStringContainsString('&lt;script&gt;', view('emails.contact', ['name' => $data['name'], 'email' => $data['email'], 'phone' => $data['phone'], 'contactMessage' => $data['message']])->render());
            return $mail->hasTo(config('portfolio.contact_to'));
        });
    }

    public function test_invalid_contact_preserves_input_and_sends_nothing(): void
    {
        Mail::fake();
        $data = $this->validData();
        $data['email'] = 'invalid';
        $data['name'] = str_repeat('x', 121);
        $data['message'] = str_repeat('x', 4001);
        $data['phone'] = str_repeat('1', 31);
        $this->from('/pt/contacts')->post('/pt/send-email', $data)->assertSessionHasErrors(['email', 'name', 'message', 'phone'])->assertSessionHasInput('email', 'invalid');
        Mail::assertNothingSent();
    }

    public function test_honeypot_and_required_fields_prevent_delivery(): void
    {
        Mail::fake();
        $this->post('/pt/send-email', [])->assertSessionHasErrors(['name', 'email', 'message']);
        $this->post('/pt/send-email', array_merge($this->validData(), ['website' => 'spam']))->assertSessionHasErrors('website');
        Mail::assertNothingSent();
    }

    public function test_delivery_failure_has_safe_feedback_and_preserves_input(): void
    {
        Mail::shouldReceive('to')->once()->andThrow(new \RuntimeException('SMTP failure'));
        $this->from('/en/contacts')->post('/en/send-email', $this->validData())->assertRedirect('/en/contacts')->assertSessionHas('error')->assertSessionHasInput('name', 'Visitor Name');
        $this->get('/en/contacts')->assertSee('Your message could not be sent')->assertDontSee('SMTP failure');
    }

    public function test_rate_limit_covers_all_contact_routes(): void
    {
        Mail::fake();
        foreach (range(1, 5) as $attempt) {
            $this->post('/pt/send-email', $this->validData())->assertStatus(302);
        }
        $this->post('/en/send-email', $this->validData())->assertStatus(429)->assertSee('Too many attempts');
        $this->post('/send-email', $this->validData())->assertStatus(429);
        Mail::assertSent(ContactMessage::class, 5);
    }
}
