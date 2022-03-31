<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Cart;

class OrderController extends Controller
{
    public function new(Request $request) {
        $cart_data = $request->session()->get('cart_data');
        $total = $request->session()->get('total');
        return view('order.new', [
            'cart_data' => $cart_data,
            'total' => $total,
        ]);
    }

    public function check(Request $request) {
        $request->session()->put('order_name', $request->order_name);
        $request->session()->put('order_postCode', $request->order_postCode);
        $request->session()->put('order_address', $request->order_address);
        $request->session()->put('payment', $request->payment);
        $cart_data = $request->session()->get('cart_data');
        $total = $request->session()->get('total');
        $delivery_charge = 500;
        $billing_amount = $total + $delivery_charge;
        return view('order.check', [
            'order_name' => $request->order_name,
            'order_postCode' => $request->order_postCode,
            'order_address' => $request->order_address,
            'payment' => $request->payment,
            'cart_data' => $cart_data,
            'total' => $total,
            'delivery_charge' => $delivery_charge,
            'billing_amount' => $billing_amount,
        ]);
    }

    public function create(Request $request) {
        $order = new Order;
        $user_id = Auth::id();
        $name = $request->name;
        $post_code = $request->post_code;
        $address = $request->address;
        if ($request->payment === "クレジット支払い") {
            $payment = 1;
        } elseif ($request->payment === "銀行振込") {
            $payment = 0;
        }
        $delivery_charge = $request->delivery_charge;
        $billing_amount = $request->billing_amount;

        $order->user_id = $user_id;
        $order->name = $name;
        $order->postal_code = $post_code;
        $order->address = $address;
        $order->payment_method = $payment;
        $order->delivery_charge = $delivery_charge;
        $order->order_status = 1;
        $order->billing_amount = $billing_amount;

        // order_code生成
        $code = Str::random(13);
        $request->session()->put('order_code', $code);
        $order->order_code = $code;

        if ($order->save()) {
            $cart_items = $request->session()->get('cart_data');
            $order = Order::where('order_code', $code)->first();
            foreach($cart_items as $cart_item) {
                $detail = new Detail;
                $detail->item_id = $cart_item->item->id;
                $detail->order_id = $order->id;
                $detail->amount = $cart_item->amount;
                $detail->price = $cart_item->item->price * $cart_item->amount * 1.1;
                $detail->create_status = 1;
                $detail->save();
            }
            Cart::where('user_id', $user_id)->delete();
            return view('order.thanks');
        } else {
            return view('order.check');
        }
    }
}
