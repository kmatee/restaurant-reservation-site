<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function getNewTotal($items)
    {
        $newTotal = 0;
        foreach ($items as $item) {
            $newTotal += $item['price'] * $item['quantity'];
        }

        return $newTotal;
    }

    public function index(Order $order)
    {
        $items = json_decode($order->items, true);
        return view('admin.orders.items.index', compact('items', 'order'));
    }

    public function edit($orderId, $itemId)
    {
        $order = Order::find($orderId);

        $items = json_decode($order->items, true);

        if(isset($items[$itemId])){
            $quantity = $items[$itemId]['quantity'];
        }
        return view('admin.orders.items.edit', compact('quantity', 'itemId', 'orderId'));
    }

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
        $order->total = $this->getNewTotal($items);
        $order->save();

        return to_route('admin.items.index', $order)->with('success', 'Item updated successfully');
    }

    public function destroy($orderId, $itemId)
    {
        $order = Order::find($orderId);
        $items = json_decode($order->items, true);

        if (isset($items[$itemId])) {
            unset($items[$itemId]);
        }

        $encodedItems = json_encode($items);
        $order->items = $encodedItems;
        $order->total = $this->getNewTotal($items);
        $order->save();

        return to_route('admin.items.index', $order)->with('success', 'Item deleted successfully');
    }
}
