@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <h2 class="text-3xl font-bold mb-4">Kategori: {{ $category->name }}</h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <a href="{{ route('products.detail', $product->id) }}" 
               class="bg-white p-4 rounded-xl shadow hover:scale-105 duration-300">

                <img src="{{ asset('image/'.$product->images[0]->image_path) }}" 
                     class="w-full h-40 object-cover rounded-lg">

                <h3 class="mt-3 font-semibold">{{ $product->name }}</h3>
            </a>
        @endforeach
    </div>

</div>
@endsection