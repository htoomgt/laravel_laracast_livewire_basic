<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\ContactForm;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function testContactFormSendOutAnEmail()
    {
        Livewire::test(ContactForm::class)
                    ->set('name', 'Htoo Maung Thait')
                    ->set('email', 'htoo.mt@blueplanet.com.mm')
                    ->set('subject', 'Testing')
                    ->set('message', 'This is a testing message')
                    ->call('submitForm')
                    ->assertSee('Your email has been sent successfully!');
    }
}
