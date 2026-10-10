<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Store a new contact form message.
     *
     * The request is protected by CSRF (Inertia + VerifyCsrfToken),
     * rate limiting (throttle middleware on the route), a honeypot
     * field and Cloudflare Turnstile (validated in the form request).
     */
    public function store(ContactFormRequest $request): RedirectResponse
    {
        // Honeypot: silently discard submissions that filled the hidden
        // "website" field, pretending success so bots do not adapt.
        if ($request->filled('website')) {
            Inertia::flash('toast', [
                'type' => 'success',
                'message' => __('Thank you! Your message has been sent.'),
            ]);

            return back();
        }

        $data = $request->safe();

        Mail::to(config('mail.from.address'))->send(new ContactMessage(
            senderName: $data['name'],
            senderEmail: $data['email'],
            subjectLine: $data['subject'] ?? null,
            messageBody: $data['message'],
        ));

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => __('Thank you! Your message has been sent. We will get back to you soon.'),
        ]);

        return back();
    }
}
