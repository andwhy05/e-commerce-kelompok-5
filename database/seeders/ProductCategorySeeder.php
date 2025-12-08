<?php
namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductCategory::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Birthday Cakes', 'Cookies', 'Cupcake', 'Pastry',
        ];

        foreach ($data as $value) {
            ProductCategory::insert([
                'name'        => $value,
                'slug'        => Str::slug($value),
                'description' => 'Default description for ' . $value,
            ]);
        }
    }
}
