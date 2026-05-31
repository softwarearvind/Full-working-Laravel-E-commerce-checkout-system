<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [

            [
                'category_id' => 1,
                'brand_id' => 1,
                'name' => 'iPhone 15',
                'slug' => Str::slug('iPhone 15'),
                'image' => 'uploads/products/iphone.jpg',
                'price' => 85000,
                'description' => 'Apple iPhone 15 Mobile',
            ],

            [
                'category_id' => 1,
                'brand_id' => 2,
                'name' => 'Samsung Galaxy S24',
                'slug' => Str::slug('Samsung Galaxy S24'),
                'image' => 'uploads/products/samsung.jpg',
                'price' => 75000,
                'description' => 'Samsung Premium Mobile',
            ],

            [
                'category_id' => 2,
                'brand_id' => 3,
                'name' => 'Nike Air Max',
                'slug' => Str::slug('Nike Air Max'),
                'image' => 'uploads/products/nike-shoe.jpg',
                'price' => 5500,
                'description' => 'Nike Running Shoes',
            ],

            [
                'category_id' => 2,
                'brand_id' => 4,
                'name' => 'Adidas Sneakers',
                'slug' => Str::slug('Adidas Sneakers'),
                'image' => 'uploads/products/adidas-shoe.jpg',
                'price' => 4500,
                'description' => 'Adidas Sports Shoes',
            ],

        ];

        foreach ($products as $product)
        {
            Product::create($product);
        }
    }
}