<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->with('images','category')->get();

        return view('products.index', compact('products'));
    }
    public function byCategory($slug)
    {
        $category = ProductCategory::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->with('images')->get();
        $products = Product::where('category_id', $category->id)->get();

        return view('products.by-category', compact('category', 'products'));
        return view('products.by-category', compact('category','products'));
    }

    public function detail($id)
    {
        $product = Product::with(['images', 'category', 'reviews'])->findOrFail($id);

        return view('products.detail', compact('product'));
    }
} 