<?php

use Inertia\Testing\AssertableInertia as Assert;

test('home page is rendered', function () {
    $this->get(route('home'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page
            ->component('Home')
            ->has('turnstileSiteKey'));
});

test('products page is rendered', function () {
    $this->get(route('products'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('Products'));
});

test('services page is rendered', function () {
    $this->get(route('services'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('Services'));
});

test('projects page is rendered', function () {
    $this->get(route('projects'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('Projects'));
});

test('contacts page is rendered', function () {
    $this->get(route('contacts'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('Contacts'));
});

test('about page is rendered', function () {
    $this->get(route('about'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('About'));
});
