<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Order $order)
    {
        $items = json_decode($order->items, true);
        return view('admin.orders.items.index', compact('items', 'order'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($orderId, $itemId)
    {
        $order = Order::find($orderId);

        $items = json_decode($order->items, true);

        if(isset($items[$itemId])){
            $quantity = $items[$itemId]['quantity'];
        }
        return view('admin.orders.items.edit', compact('quantity', 'itemId', 'orderId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$orderId, $itemId)
    {
        $order = Order::find($orderId);
        $items = json_decode($order->items, true);
        $newQuantity = $request->input('quantity');

        if (isset($items[$itemId])) {
            $items[$itemId]['quantity'] = $newQuantity;
        }

        $encodedItems = json_encode($items);
        $order->items = $encodedItems;
        $order->save();

        return to_route('admin.items.index', $order)->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
