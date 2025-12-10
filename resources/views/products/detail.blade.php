@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 grid md:grid-cols-2 gap-10">

    <img src="{{ asset('image/'.$product->images[0]->image_path) }}"
         class="w-full h-96 object-cover rounded-xl shadow">

    <div> 
        <h1 class="text-4xl font-bold text-pink-700">{{ $product->name }}</h1>

        <p class="text-lg text-gray-700 mt-3">
            {{ $product->description }}
        </p>

        <p class="mt-4 text-2xl text-pink-600 font-bold">
            Rp {{ number_format($product->price) }}
        </p>

        <p class="mt-2">
            <span class="font-semibold">Kategori:</span> {{ $product->category->name }}
        </p>

        <a href="{{ route('checkout.index', $product->id) }}"
           class="mt-6 inline-block bg-pink-500 text-white px-6 py-3 rounded-full shadow hover:bg-pink-600">
            Beli Sekarang
        </a>
    </div>
</div>
@endsection