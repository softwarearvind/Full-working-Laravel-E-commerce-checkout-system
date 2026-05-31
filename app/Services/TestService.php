<?php

namespace App\Services;
use App\Models\Product;
use App\Models\Category;


class TestService
{
    /**
     * Create a new class instance.
     */
    public function dataget()
    {
       $cagury = Category::select('id', 'name')->distinct()->latest()->get();
        $products = Product::latest()->paginate(8);
        return view('welcome', compact('products','cagury'));
    }

   public function catagurydata($id)
{
    $category = Category::findOrFail($id);
    $products = Product::where('category_id', $id)->latest()->paginate(8);
    return view('category', compact('products', 'category'));
}
}
