<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_category_id' => 1,
                'name' => 'Matcha Birthday Cake',
                'description' => 'Kue ulang tahun rasa matcha dengan krim lembut dan aroma teh hijau premium.',
                'price' => 285000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 2,
                'name' => 'Matcha Cookies',
                'description' => 'Cookies matcha renyah dengan rasa manis seimbang.',
                'price' => 85000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_category_id' => 3,
                'name' => 'Vanilla Cupcake',
                'description' => 'Cupcake vanilla lembut dengan frosting krim susu.',
                'price' => 45000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
