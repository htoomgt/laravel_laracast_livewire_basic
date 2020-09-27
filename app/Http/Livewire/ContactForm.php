<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $successMessage;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|max:1024'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();

        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['subject'] = $this->subject;
        $contact['message'] = $this->message;

        $this->resetForm();
        $this->successMessage = "Your email has been sent successfully!";

        sleep(1);

        //process email sending
    }

    public function render()
    {
        return view('livewire.contact-form');
    }

    private function resetForm()
    {
        $this->name = "";
        $this->email = "";
        $this->subject = "";
        $this->message = "";
    }
}
