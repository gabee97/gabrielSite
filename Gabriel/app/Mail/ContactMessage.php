<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMessage extends Mailable
{
    public array $contact;

    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo($this->contact['email'], $this->contact['name'])
            ->subject(__('messages.contact_email_subject'))
            ->view('emails.contact', [
                'name' => $this->contact['name'], 'email' => $this->contact['email'],
                'phone' => $this->contact['phone'] ?? null,
                'contactMessage' => $this->contact['message'],
            ]);
    }
}
