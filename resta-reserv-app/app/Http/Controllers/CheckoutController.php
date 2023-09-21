<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('thankyou-order');
    }

    public function store(Request $request)
    {

        $order = Order::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip_code'),
            'country' => $request->input('country'),
            'items' => $request->input('items'),
            'total' => $request->input('total'),
        ]);
        
        $email = auth()->user()->email;
        Mail::to($email)->send(new OrderConfirmationMail($order));

        return view('thankyou-order');
    }
}
