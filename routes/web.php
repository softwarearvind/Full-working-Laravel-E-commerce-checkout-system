<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\fronted\frountedController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;






// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[frountedController::class,'index']);
Route::get('category/products/{id}',[frountedController::class,'ctagury'])->name('category.products');
Route::get('product/show/{slug}',[frountedController::class,'show'])->name('product.show');
Route::post('/cart/add', [frountedController::class, 'add'])->name('cart.add');
Route::get('/cart', [frountedController::class, 'cart'])->name('cart.index');

Route::middleware('auth')->group(function (){

 Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
 Route::post('/place-order',[CheckoutController::class,'placeOrder'])->name('place.order');

  Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
  Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');

   Route::get('/order/{id}/invoice', [OrderController::class, 'invoice'])->name('order.invoice');


});



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

 Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
 Route::get('/product/view', [AdminController::class, 'showdata'])->name('product.view');
 Route::get('/product/create',[AdminController::class,'create'])->name('product.create');
 Route::post('/product.store',[AdminController::class,'store'])->name('product.store');

  Route::get('/orders', [AdminController::class, 'oders'])->name('admin.orders');
   Route::get('/orders/{id}', [AdminController::class, 'show'])->name('admin.orders.show');
});







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
