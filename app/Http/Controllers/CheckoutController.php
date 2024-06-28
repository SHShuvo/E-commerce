<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stripe = new StripeClient(config('services.stripe.secret'));
        
        $order = Order::where('user_id', auth()->user()->id)->where('payment_intent', null)->first();
        if(!$order){
            return redirect()->route('checkout_success.index');
        }

        $intent = $stripe->paymentIntents->create([
            'amount'=> (int)$order->total,
            'currency'=>'usd',
            'payment_method_types' => ['card'],
        ]);
        return Inertia::render('Checkout', [
            'intent'=> $intent,
            'order'=>$order,
            'pk'=>config('services.stripe.public'),
        ]);
    }

    
    
    public function store(Request $request)
    {
        $res = Order::where('user_id', auth()->user()->id)
            ->where('payment_intent', null)->first();
        if($res){
            $res->total = $request->total;
            $res->total_decimal = $request->total_decimal;
            $res->items = json_encode($request->items);
            $res->save();
        }
        else{
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->total = $request->total;
            $order->total_decimal = $request->total_decimal;
            $order->items = json_encode($request->items);
            $order->save();
        }

        return redirect()->route('checkout.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request)
    {
        $order = Order::where('user_id', auth()->user()->id)
            ->where('payment_intent', null)->first();
        
        $order->payment_intent = $request->payment_intent;
        $order->save();

        Mail::to($request->user())->send(new OrderShipped($order));
        return redirect()->route('checkout_success.index');
    }

   
}
