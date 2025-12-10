@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    <h2 class="text-3xl font-bold text-pink-700 mb-6">Checkout</h2>

    <div class="bg-white p-6 rounded-xl shadow grid md:grid-cols-2 gap-8">

        {{-- Product Preview --}}
        <div>
            <img src="{{ asset('image/'.$product->images[0]->image_path) }}"
                 class="w-full h-64 object-cover rounded-lg shadow">

            <h3 class="mt-4 text-xl font-semibold">{{ $product->name }}</h3>
            <p class="text-pink-600 text-lg font-bold">
                Rp {{ number_format($product->price) }}
            </p>
        </div>

        {{-- Checkout Form --}}
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <label class="block font-semibold mt-3">Alamat Pengiriman</label>
            <textarea name="address" class="w-full border p-3 rounded-lg" required></textarea>

            <label class="block font-semibold mt-3">Jenis Pengiriman</label>
            <select name="shipping" class="w-full border p-3 rounded-lg" required>
                <option value="">-- Pilih --</option>
                <option value="Regular">Regular</option>
                <option value="Express">Express</option>
                <option value="Sameday">Same Day</option>
            </select>

            <button class="mt-6 bg-pink-500 text-white w-full py-3 rounded-lg hover:bg-pink-600">
                Selesaikan Pembelian
            </button>
        </form>

    </div>

</div>
@endsection