<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [

            [
                'name' => 'Apple',
                'slug' => Str::slug('Apple'),
                'description' => 'Apple Mobile Brand',
            ],

            [
                'name' => 'Samsung',
                'slug' => Str::slug('Samsung'),
                'description' => 'Samsung Electronics',
            ],

            [
                'name' => 'Nike',
                'slug' => Str::slug('Nike'),
                'description' => 'Nike Fashion Brand',
            ],

            [
                'name' => 'Adidas',
                'slug' => Str::slug('Adidas'),
                'description' => 'Adidas Sports Brand',
            ],

        ];

        foreach ($brands as $brand)
        {
            Brand::create($brand);
        }
    }
}