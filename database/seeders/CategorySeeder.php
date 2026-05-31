<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            [
                'name' => 'Electronics',
                'description' => 'Electronic Products',
            ],

            [
                'name' => 'Fashion',
                'description' => 'Fashion Products',
            ],

            [
                'name' => 'Books',
                'description' => 'Books Collection',
            ],

            [
                'name' => 'Furniture',
                'description' => 'Home Furniture',
            ],

        ];

        foreach ($categories as $category)
        {
            Category::create($category);
        }
    }
}