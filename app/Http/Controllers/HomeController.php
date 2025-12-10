<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->category;

        $products = Product::with('images')
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('product_category_id', $categoryId);
            })
            ->latest()
            ->get();

        $categories = ProductCategory::all();

        return view('Homepage.home', compact('products', 'categories'));
    }
} 