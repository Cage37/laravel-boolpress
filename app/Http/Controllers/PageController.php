<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('guest.welcome');
    }

    public function about()
    {
        return view('guest.about');
    }


    public function contacts()
    {
        return view('guest.contacts');
    }

    public function sendContactForm(Request $request)
    {
        $validateData = $request->validate([
            'full_name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);

        Mail::to('admin@test.com')->send(new ContactFormMail($validateData));
        return redirect()->back()->with('message', 'Success! Thanks for your email!');
    }
}