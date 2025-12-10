<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_categories')->insert([
            [
                'name' => 'Birthday Cake',
                'description' => 'Kue ulang tahun custom dengan berbagai varian rasa'
            ],
            [
                'name' => 'Cookies',
                'description' => 'Cookies renyah dengan bahan premium'
            ],
            [
                'name' => 'Cupcake',
                'description' => 'Cupcake lembut dengan topping menarik'
            ],
            [
                'name' => 'Pastry',
                'description' => 'Pastry fresh dibuat setiap hari'
            ],
        ]);
    }
}
