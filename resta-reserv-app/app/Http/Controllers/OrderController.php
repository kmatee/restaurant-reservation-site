<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        if(auth()->check()){
            $user_id = auth()->user()->id;
            \Cart::session($user_id);
            $items = \Cart::getContent();
            $num_of_items = $items->count();
            $total = \Cart::getTotal();
            if($num_of_items == 0){
                return redirect()->route('home')->with('danger', 'You cannot checkout with an empty cart');
            }
        }
        else{
            return redirect()->route('home')->with('danger', 'You need to be logged in');
        }

        return view('order-confirm', compact('items', 'num_of_items', 'total'));
    }

    public function processOrder(Request $request)
    {

        $request->validate([
            "first_name" => ['required', 'max:30'],
            "last_name" => ['required', 'max:30'],
            "phone_number" => ['required'],
            "address" => ['required', 'max:50'],
            "zip_code" => ['required', 'numeric'],
            "country" => ['required'],
        ]);

        $orderDetails = [
            "first_name" => $request->input('first_name'),
            "last_name" => $request->input('last_name'),
            "phone_number" => $request->input('phone_number'),
            "address" => $request->input('address'),
            "zip_code" => $request->input('zip_code'),
            "country" => $request->input('country'),
        ];

            $user_id = auth()->user()->id;
            \Cart::session($user_id);
            $items = \Cart::getContent();
            $num_of_items = $items->count();
            $total = \Cart::getTotal();

        return view('checkout', compact('orderDetails', 'items', 'total'));
    }

}
