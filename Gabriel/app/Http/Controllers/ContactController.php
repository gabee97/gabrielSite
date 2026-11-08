<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:254',
            'phone' => 'nullable|string|max:30',
            'message' => 'required|string|max:4000',
            'website' => 'nullable|string|max:0',
        ]);
        try {
            Mail::to(config('portfolio.contact_to'))->send(new ContactMessage($data));
        } catch (Throwable $exception) {
            // Do not log visitor data or SMTP credentials.
            Log::warning('Contact delivery failed', ['type' => get_class($exception)]);
            return back()->withInput($request->only('name', 'email', 'phone', 'message'))
                ->with('error', __('portfolio.delivery_error'));
        }
        return back()->with('success', __('messages.email_success'));
    }
}
