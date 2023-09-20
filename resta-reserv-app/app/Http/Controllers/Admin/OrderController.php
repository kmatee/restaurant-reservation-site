<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $items = json_decode($order->items, true);

        return view('admin.orders.items.index', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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
