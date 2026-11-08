@include('includes.head')
@include('includes.header')

<main id="main-content">
<section class="page-hero">
    <div class="container">
        <p class="section-kicker">@lang('messages.contacts')</p>
        <h1>@lang('messages.send_message')</h1>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="contact-card">
            @include('includes.contact-form')
        </div>
    </div>
</section>

<section class="site-section social-section">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-sm-12 col-md-4">
                <a class="social-card linkedin" href="https://www.linkedin.com/in/gabriel-oliveira-gop1997/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-linkedin"></i> @lang('messages.contact_linkedin')
                </a>
            </div>
            <div class="col-sm-12 col-md-4">
                <a class="social-card whatsapp" href="https://wa.me/5541987694868?text=@lang('messages.contact_whatsapp_prefill')" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-whatsapp"></i> @lang('messages.contact_whatsapp')
                </a>
            </div>
            <div class="col-sm-12 col-md-4">
                <a class="social-card instagram" href="https://www.instagram.com/oliveiragabee_/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-instagram"></i> @lang('messages.contact_instagram')
                </a>
            </div>
        </div>
    </div>
</section>
</main>

@include('includes.footer')
