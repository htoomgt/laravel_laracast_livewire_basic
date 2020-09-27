<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function showContactForm()
    {
        return view('contact.contact_page');
    }

    public function sendContactMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|max:1024'
        ]);

        // dd('success in email sending!');
        //process email sending


        return back()->with('email_success','Your email has been sent successfully!');
    }
}
