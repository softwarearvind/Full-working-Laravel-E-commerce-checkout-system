<?php

namespace App\Http\Controllers\fronted;
use App\Services\TestService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class frountedController extends Controller
{
     public function index(TestService $service)
    {
        return $service->dataget();
    }

    public function ctagury(TestService $service, $id)
    {
    return $service->catagurydata($id);
    }

    public function show($slug)
    {
    	  $product = Product::all()->first(function ($item) use ($slug) {
        return Str::slug($item->name) === $slug;
    });

    if (!$product) {
        abort(404);
    }
    return view('product_details', compact('product'));
    }

    public function add(Request $request)
   {
     if (!Auth::check()) {
        return redirect()->route('login')
            ->with('error', 'Please login first to add products to cart.');
    }

    $request->validate([
        'product_id' => 'required',
        'quantity'   => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);

    $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->first();

    if ($cart) {
        $cart->quantity += $request->quantity;
        $cart->save();
    } else {
        Cart::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'quantity'   => $request->quantity,
            'price'      => $product->price,
        ]);
    }

    return back()->with('success', 'Product Added To Cart Successfully');
   }

public function cart()
{
      $carts = Cart::with('product')->where('user_id', Auth::id())->get();
      return view('cart', compact('carts'));

}



}
