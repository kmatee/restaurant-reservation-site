<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function getCartItems()
    {
        $user_id = auth()->user()->id;
        \Cart::session($user_id);
        $items = \Cart::getContent();

        return $items;
    }

    public function payment()
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
            'success_url' => 'http://localhost:4242/success',
            'cancel_url' => 'http://localhost:4242/cancel',
        ]);

        return redirect($checkout_session->url);
    }
}
