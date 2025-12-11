@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    {{-- Search Bar --}}
    <form method="GET" action="{{ route('products.index') }}" class="mb-6">
        <input type="text" name="search" placeholder="Cari produk..." 
            class="w-full px-4 py-2 border rounded-lg"
            value="{{ request('search') }}">
    </form>

    <h2 class="text-3xl font-bold mb-4">Semua Produk</h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <a href="{{ route('products.detail', $product->id) }}" 
               class="bg-white p-4 shadow rounded-xl hover:scale-105 duration-300">

                <img src="{{ asset('image/'.$product->images[0]->image_path) }}" 
                     class="w-full h-40 object-cover rounded-lg mb-3">

                <h3 class="font-semibold">{{ $product->name }}</h3>
                <p class="text-pink-600 text-sm">Rp {{ number_format($product->price) }}</p>
            </a>
        @endforeach
    </div>
</div> 
@endsection