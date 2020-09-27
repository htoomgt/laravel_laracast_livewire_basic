<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testContactPageContainLivewireContactForm()
    {
        $this->get('/contact_form')
                ->assertSeeLivewire('contact-form');
    }
}
