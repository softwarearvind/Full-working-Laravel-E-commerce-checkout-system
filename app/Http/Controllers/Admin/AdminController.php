<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showdata()
    {
        $products = Product::with('category','brand')->latest()->paginate(5);
        return view('admin.paroduct',compact('products'));
    }

    public function create()
    {
        $cata = Category::latest()->get();
        $brand = Brand::latest()->get();
        return view('admin.product_add', compact('cata', 'brand'));
    }

    public function store(ProductRequest $request)
{
    $imageName = null;

    if ($request->hasFile('image')) {

        $file = $request->file('image');

        $imageName = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('products'), $imageName);
    }

    Product::create([

        'name'        => $request->name,
        'category_id' => $request->category,
        'brand_id'    => $request->brand_id,
        'price'       => $request->price,
        'quantity'    => $request->quantity,
        'status'      => $request->status,
        'description' => $request->description,
        'image'       => $imageName,

    ]);

    return redirect()->back()->with('success', 'Product Added Successfully');
}

public function oders()
{
  $orders = Order::with('items.product')->latest()->get();
   return view('admin.orders.index', compact('orders'));
}

   public function show($id)
    {
     $order = Order::with('items.product')->findOrFail($id);
     return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->order_status = $request->order_status;
        $order->payment_status = $request->payment_status;
        $order->save();

        return back()->with('success', 'Order updated successfully');
    }



}