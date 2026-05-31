<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendOrderInvoiceJob;


class CheckoutController extends Controller
{
    public function index()
    {
    $carts = Cart::with('product')->where('user_id', Auth::id())->get();
    $grandTotal = 0;
    foreach ($carts as $cart) {
    $grandTotal += $cart->price * $cart->quantity;
    }
    if ($carts->isEmpty()) {
    	return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        return view('checkout', compact('carts', 'grandTotal'));
    }

  public function placeOrder(Request $request)
{
    DB::beginTransaction();

    try {

        $carts = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Cart is empty');
        }

        $grandTotal = 0;

        foreach ($carts as $cart) {
            $grandTotal += $cart->price * $cart->quantity;
        }

        // ✅ FIXED: ONLY ONE CREATE
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_no' => 'ORD' . time(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'grand_total' => $grandTotal,
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
            'order_status' => 'pending',
        ]);

        // Order Items + Stock Minus
        foreach ($carts as $cart) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
            ]);

            $product = Product::find($cart->product_id);

            if ($product) {
                $product->quantity -= $cart->quantity;
                $product->save();
            }
        }

        // Clear Cart
        Cart::where('user_id', auth()->id())->delete();

        DB::commit();
       SendOrderInvoiceJob::dispatch($order);

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Order placed successfully');

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with('error', $e->getMessage());
    }
}
}
