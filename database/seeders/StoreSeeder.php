<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stores')->insert([
            [
                'name' => 'Default Store',
                'slug' => 'default-store',
                'address' => 'Jl. Contoh No. 123',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'postal_code' => '12345',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}