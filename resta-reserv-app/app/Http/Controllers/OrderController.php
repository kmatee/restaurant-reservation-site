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
        }
        else{
            return redirect()->route('home')->with('danger', 'You need to be logged in');
        }

        return view('order-confirm', compact('items', 'num_of_items'));
    }
}
