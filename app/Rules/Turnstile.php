<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Turnstile implements ValidationRule
{
    /**
     * Verify the Cloudflare Turnstile token against the siteverify API.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secretKey = config('services.turnstile.secret_key');

        // Turnstile is optional: skip verification when no secret key is
        // configured (e.g. local development without Cloudflare keys).
        if (blank($secretKey)) {
            return;
        }

        if (blank($value)) {
            $fail(__('Please complete the human verification.'));

            return;
        }

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => $secretKey,
            'response' => $value,
        ]);

        if (! $response->successful() || $response->json('success') !== true) {
            $fail(__('Human verification failed. Please try again.'));
        }
    }
}
