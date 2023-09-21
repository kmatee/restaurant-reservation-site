<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $items = json_decode($order->items, true);

        return view('admin.orders.items.index', compact('items'));
    }


    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $order->update($request->validate([
            "first_name" => ['required', 'max:30'],
            "last_name" => ['required', 'max:30'],
            "phone_number" => ['required'],
            "address" => ['required', 'max:50'],
            "zip_code" => ['required', 'numeric'],
            "country" => ['required'],
        ]));

        return to_route('admin.orders.index')->with('success', 'Order updated successfully');
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return to_route('admin.orders.index')->with('success', 'Order deleted successfully');
    }

    public function showItems(Order $order)
    {
        $items = $order->items;

        return view('admin.orders.items.index', compact('items'));
    }

}
