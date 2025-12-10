<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'store_id' => 1,
                'product_category_id' => 1,
                'name' => 'Matcha Birthday Cake',
                'slug' => 'matcha-birthday-cake',
                'description' => 'Kue ulang tahun rasa matcha dengan krim lembut dan aroma teh hijau premium.',
                'price' => 285000,
                'weight' => 1200,
                'stock' => 10, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'store_id' => 1,
                'product_category_id' => 2,
                'name' => 'Matcha Cookies',
                'slug' => 'matcha-cookies',
                'description' => 'Cookies matcha renyah dengan rasa manis seimbang.',
                'price' => 85000,
                'weight' => 500,
                'stock' => 25, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'store_id' => 1,
                'product_category_id' => 3,
                'name' => 'Vanilla Cupcake',
                'slug' => 'vanilla-cupcake',
                'description' => 'Cupcake vanilla lembut dengan frosting krim susu.',
                'price' => 45000,
                'weight' => 150,
                'stock' => 30, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
