<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
  
  public function index()
  {
  	$orders = Order::where('user_id', Auth::id())->latest()->get();
     return view('orders.index', compact('orders'));
  }

  public function show($id)
{
    $order = Order::with('items.product')
        ->where('user_id', Auth::id())
        ->findOrFail($id);

    return view('orders.show', compact('order'));
}

public function invoice($id)
{
    $order = Order::with('items.product')
        ->where('user_id', auth()->id())
        ->findOrFail($id);

    $pdf = Pdf::loadView('invoice', compact('order'));

    return $pdf->download('invoice-'.$order->order_no.'.pdf');
}

}
