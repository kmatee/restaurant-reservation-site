<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FooterController extends Controller
{
    public function contact()
    {
        return view('footer.contact');
    }

    public function contactEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:200'
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        Mail::to('kant.mate@gmail.com')->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully. We will contact you back soon');


    }

    public function about()
    {
        return view('footer.about');
    }
}
