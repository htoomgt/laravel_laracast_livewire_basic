<?php

namespace App\Http\Livewire;

use App\Mail\ContactForm as MailContactForm;
use Illuminate\Support\Facades\Mail;
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
        $contact['bodyMessage'] = $this->message;
        $toName = "Htoo Maung Thait (BP)";
        $toEmail = "htoo.mt@blueplanet.com.mm";


        $this->resetForm();
        $this->successMessage = "Your email has been sent successfully!";

        sleep(1);

        //process email sending
        /* Mail::send('emails.contact_mail', $contact, function($message) use($toName, $toEmail){
            $message->to($toEmail, $toName)
                    ->subject('Livewire Testing');

            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        }); */

        Mail::to($toEmail)->send(new MailContactForm($contact));
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
