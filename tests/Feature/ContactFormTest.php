<?php

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Testing\AssertableInertia as Assert;

function validContactPayload(array $overrides = []): array
{
    return array_merge([
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'subject' => 'Project inquiry',
        'message' => 'I would like to discuss a new device project.',
    ], $overrides);
}

test('contact form sends an email and flashes a success message', function () {
    Mail::fake();

    $response = $this->post(route('contacts.store'), validContactPayload());

    $response->assertRedirect();

    // The flash toast is shared with the frontend through Inertia.
    $this->get(route('contacts'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Contacts')
            ->hasFlash('toast.type', 'success'));

    Mail::assertSent(ContactMessage::class, function (ContactMessage $mail) {
        $replyTo = array_values($mail->envelope()->replyTo)[0];

        return $mail->hasTo(config('mail.from.address'))
            && $replyTo->address === 'jane@example.com'
            && $replyTo->name === 'Jane Doe'
            && $mail->senderName === 'Jane Doe'
            && $mail->senderEmail === 'jane@example.com'
            && $mail->subjectLine === 'Project inquiry'
            && $mail->messageBody === 'I would like to discuss a new device project.';
    });
});

test('contact form validates and sanitizes the input', function () {
    Mail::fake();

    $response = $this->post(route('contacts.store'), [
        'name' => '',
        'email' => 'not-an-email',
        'subject' => str_repeat('a', 200),
        'message' => 'short',
    ]);

    $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
    Mail::assertNothingSent();
});

test('honeypot field silently discards bot submissions', function () {
    Mail::fake();

    $response = $this->post(route('contacts.store'), validContactPayload([
        'website' => 'https://spam.example',
    ]));

    // The bot gets a fake success response, but no email is sent.
    $response->assertRedirect();
    $response->assertSessionHas('inertia.flash_data.toast.type', 'success');
    Mail::assertNothingSent();
});

test('contact form is rate limited', function () {
    Mail::fake();

    foreach (range(1, 5) as $attempt) {
        $this->post(route('contacts.store'), validContactPayload())
            ->assertRedirect();
    }

    $this->post(route('contacts.store'), validContactPayload())
        ->assertTooManyRequests();

    Mail::assertSent(ContactMessage::class, 5);
});

test('contact form route uses the web group (CSRF) and rate limiting', function () {
    $route = Route::getRoutes()->getByName('contacts.store');

    expect($route)->not->toBeNull()
        ->and($route->gatherMiddleware())->toContain('web')
        ->and($route->gatherMiddleware())->toContain('throttle:5,1');
});

test('turnstile token is required when a secret key is configured', function () {
    Mail::fake();
    Config::set('services.turnstile.secret_key', 'test-secret-key');

    $response = $this->post(route('contacts.store'), validContactPayload());

    $response->assertSessionHasErrors(['cf-turnstile-response']);
    Mail::assertNothingSent();
});

test('failed turnstile verification rejects the submission', function () {
    Mail::fake();
    Config::set('services.turnstile.secret_key', 'test-secret-key');

    Http::fake([
        'challenges.cloudflare.com/*' => Http::response(['success' => false]),
    ]);

    $response = $this->post(route('contacts.store'), validContactPayload([
        'cf-turnstile-response' => 'invalid-token',
    ]));

    $response->assertSessionHasErrors(['cf-turnstile-response']);
    Mail::assertNothingSent();
});

test('valid turnstile token passes verification and sends the email', function () {
    Mail::fake();
    Config::set('services.turnstile.secret_key', 'test-secret-key');

    Http::fake([
        'challenges.cloudflare.com/*' => Http::response(['success' => true]),
    ]);

    $response = $this->post(route('contacts.store'), validContactPayload([
        'cf-turnstile-response' => 'valid-token',
    ]));

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
    Mail::assertSent(ContactMessage::class);

    Http::assertSent(fn ($request) => $request->url() === 'https://challenges.cloudflare.com/turnstile/v0/siteverify'
        && $request['secret'] === 'test-secret-key'
        && $request['response'] === 'valid-token');
});

test('contact email renders the sender details', function () {
    $mail = new ContactMessage(
        senderName: 'Jane Doe',
        senderEmail: 'jane@example.com',
        subjectLine: 'Project inquiry',
        messageBody: 'I would like to discuss a new device project.',
    );

    $mail->assertSeeInHtml('Jane Doe');
    $mail->assertSeeInHtml('jane@example.com');
    $mail->assertSeeInHtml('Project inquiry');
    $mail->assertSeeInHtml('I would like to discuss a new device project.');
});
