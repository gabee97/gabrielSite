<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        $data = $request->only('name', 'email', 'phone', 'message');

        // Envio do e-mail
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('gabrieloli123@gmail.com', 'Gabriel')
                ->subject(__('messages.contact_email_subject'));
            $message->from($data['email'], $data['name']);
        });

        return back()->with('success', __('messages.email_success'));
    }
}
