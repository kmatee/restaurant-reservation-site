<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function getCartItems()
    {
        $user_id = auth()->user()->id;
        \Cart::session($user_id);
        $items = \Cart::getContent();

        return $items;
    }

    public function payment(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SK'));

        $items = $this->getCartItems();
        $lineItems = [];
        foreach ($items as $item){
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'huf',
                    'product_data' => [
                    'name' => $item->name,
                    ],
                    'unit_amount' => $item->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        }

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('thankyou-order', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => 'http://localhost:4242/success',
        ]);

        $order = Order::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip_code'),
            'country' => $request->input('country'),
            'items' => $request->input('items'),
            'total' => $request->input('total'),
            'status' => 'unpaid',
            'session_id' => $checkout_session->id,
        ]);
        
        $order->save();

        return redirect($checkout_session->url);
    }
}
