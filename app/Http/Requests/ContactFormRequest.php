<?php

namespace App\Http\Requests;

use App\Rules\Turnstile;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email:rfc', 'max:255'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            // Honeypot field: must stay empty for human submissions.
            'website' => ['nullable', 'string', 'max:255'],
            // Cloudflare Turnstile token (invisible widget). Required when
            // Turnstile is configured; optional in local development.
            'cf-turnstile-response' => config('services.turnstile.secret_key')
                ? ['required', 'string', new Turnstile]
                : ['nullable', 'string', new Turnstile],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => __('Please tell us your name.'),
            'email.required' => __('Please enter your email address.'),
            'email.email' => __('Please enter a valid email address.'),
            'message.required' => __('Please write a short message.'),
            'message.min' => __('Your message is a bit short — please add a few more details.'),
            'cf-turnstile-response.required' => __('Please complete the human verification.'),
        ];
    }
}
