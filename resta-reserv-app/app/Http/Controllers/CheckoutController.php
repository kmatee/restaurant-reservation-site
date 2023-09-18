<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('thankyou');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        Order::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip_code'),
            'country' => $request->input('country'),
            'items' => $request->input('items'),
            'total' => $request->input('total'),
        ]);

        return to_route('thankyou-order');
    }
}
