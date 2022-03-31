<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;

class CartController extends Controller
{
    public function add(Request $request) {
        $cart = new Cart;
        $cart->fill($request->all())->save();
        return redirect(route('user.cart_index'));
    }

    public function index(Request $request) {
        $user = Auth::user();
        if ($user->carts->first()) {
            // $cart_data = Cart::where('user_id', $user)->get();
            $cart_data = $user->carts;
            $total = 0;
            foreach($cart_data as $cart) {
                $small_total = $cart->item->price * $cart->amount * 1.1;
                $total += $small_total;
            }
            $request->session()->put('cart_data', $cart_data);
            $request->session()->put('total', $total);
            return view('cart.index', [
                'cart_data' => $cart_data,
                'total' => $total,
            ]);
        } else {
            return view('cart.index');
        }
    }

    public function destroy(Request $request) {
        $cart_data = Cart::find($request->id);
        if(!empty($cart_data)) {
            $cart_data->delete();
        }
        return redirect(route('user.cart_index'));
    }

}
