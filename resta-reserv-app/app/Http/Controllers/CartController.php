<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class CartController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            $user_id = auth()->user()->id;
        }
        else{
            return redirect()->back()->with('danger', 'Login view your cart');
        }
        \Cart::session($user_id);
        $items = \Cart::getContent();
        $num_of_items = $items->count();

        $total = \Cart::session($user_id)->getTotal();

        return view('shopping-cart', compact('items', 'num_of_items', 'total'));
    }


    public function addToCart(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->back()->with('danger', 'Login to add item to your cart');
        }
        else {
            $user_id = auth()->user()->id;
            $menuItem = Menu::find($request->input('menu_id'));
            $imagePath = str_replace('public', 'storage', $menuItem->image);
            \Cart::session($user_id)->add(array(
                'id' => $menuItem->id,
                'name' => $menuItem->name,
                'price' => $menuItem->price,
                'quantity' => 1,
                'attributes' => array('image' => $imagePath), 
            ));
        }

        return redirect()->back()->with('success', 'Item added to your cart');
    }

    public function remove($id)
    {
        $user_id = auth()->user()->id;
        \Cart::session($user_id);
        \Cart::remove($id);

        return redirect()->back();

    }

    public function increaseQty($id)
    {
        $user_id = auth()->user()->id;
        \Cart::session($user_id);
        \Cart::update($id, array(
            'quantity' => 1,
        ));

        return redirect()->back();
    }

    public function decreaseQty($id)
    {
        $user_id = auth()->user()->id;
        \Cart::session($user_id);
        \Cart::update($id, array(
            'quantity' => -1,
        ));

        return redirect()->back();
    }

}
