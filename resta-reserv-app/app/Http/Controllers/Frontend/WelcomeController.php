<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            $user_id = auth()->user()->id;
            \Cart::session($user_id);
            $items = \Cart::getContent();
            $num_of_items = $items->count();
            //dd($num_of_items);
        }

        $specials = Category::where('name', 'specials')->first();
        return view('welcome', compact('specials', 'num_of_items'));
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
