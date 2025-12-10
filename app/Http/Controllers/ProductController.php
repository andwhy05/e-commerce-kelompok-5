<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function storeImage(Request $request, Product $product)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Simpan file ke storage
    $path = $request->file('image')->store('products', 'public');

    // Simpan ke database
    ProductImage::create([
        'product_id'   => $product->id,
        'image'        => $path,
        'is_thumbnail' => $request->has('is_thumbnail'),
    ]);

    return back()->with('success', 'Gambar berhasil diupload');
}
}
