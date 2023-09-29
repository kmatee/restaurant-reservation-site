<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SK'));
        $sessionId = $request->get('session_id');
        
        
        try {
            $session = $stripe->checkout->sessions->retrieve($sessionId);
            if (!$session){
                throw new NotFoundHttpException;
            }
        } catch (\Exception $e) {
            throw new NotFoundHttpException;
        }
        

        //$customer = $stripe->customers->retrieve($session->customer);

        return view('thankyou-order', compact('sessionId'));
    }

    public function store(Request $request)
    {

        $order = Order::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip_code'),
            'country' => $request->input('country'),
            'items' => $request->input('items'),
            'total' => $request->input('total'),
        ]);
        
        $email = auth()->user()->email;
        Mail::to($email)->send(new OrderConfirmationMail($order));

        return view('thankyou-order');
    }
}
