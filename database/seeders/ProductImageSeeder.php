<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'image' => 'products/matcha.jpg',
                'is_thumbnail' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'image' => 'products/matcha-cookies.jpg',
                'is_thumbnail' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'image' => 'products/cupcake.jpg',
                'is_thumbnail' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
