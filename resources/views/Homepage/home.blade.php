<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetCake | Home</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; }
        .logo-font { font-family: 'Parisienne', cursive; }
    </style>
</head>

<body class="bg-pink-50">

<!-- NAVBAR / HEADER -->
<header class="fixed top-0 w-full z-50 bg-pink-700/30 backdrop-blur-lg shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LOGO -->
        <h1 class="text-5xl font-bold text-pink-600 logo-font tracking-wide">
            SweetCake
        </h1>

        <!-- Search Bar -->
        <div class="hidden md:flex items-center w-1/3 bg-pink-50 border border-pink-200 rounded-full px-4 py-2 shadow-sm">
            <i class="fas fa-search text-pink-400"></i>
            <input 
                type="text" 
                placeholder="Cari kue favoritmu..." 
                class="w-full bg-transparent focus:outline-none px-3 text-pink-700"
            >
        </div>

        <!-- NAVIGATION -->
        <nav class="hidden md:flex space-x-8 font-semibold text-pink-800">
            <a href="#home" class="hover:text-pink-500 transition">Home</a>
            <a href="#products" class="hover:text-pink-500 transition">Produk</a>
            <a href="#cart" class="hover:text-pink-500 transition">Keranjang</a>
        </nav>

        <!-- ICON USER -->
        <div class="flex items-center text-pink-600 text-2xl space-x-6">

            @auth
                <a href="{{ route('profile.edit') }}"
                   class="hover:text-pink-400 transition"
                   title="Profile">
                    <i class="fas fa-user"></i>
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="hover:text-pink-400 transition"
                   title="Login">
                    <i class="fas fa-user"></i>
                </a>
            @endauth

        </div>

        <!-- MOBILE ICON -->
        <div class="md:hidden text-2xl text-pink-700">
            <i class="fas fa-bars"></i>
        </div>

    </div>
</header>

<!-- ================= HERO ================= -->
<section id="home" class="pt-36 pb-20">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <h1 class="text-5xl md:text-6xl font-bold text-pink-700 leading-tight">
                Fresh <span class="text-pink-500">Cakes</span> Everyday 🍰
            </h1>
            <p class="text-pink-700 mt-4 text-lg">
                Kue dibuat setiap hari dengan bahan premium, rasa lembut, dan tampilan elegan.
            </p>
            <a href="#products"
               class="inline-block mt-6 bg-pink-500 text-white px-8 py-3 rounded-full shadow-lg hover:bg-pink-600 transition">
                Explore Products
            </a>
        </div>

        <div>
            <img src="https://via.placeholder.com/500x400?text=Sweet+Cake"
                 class="w-full drop-shadow-xl rounded-xl">
        </div>

    </div>
</section>

<!-- ================= ALL PRODUCTS ================= -->
<!-- ================= ALL PRODUCTS ================= -->
<section id="products" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-center text-4xl font-bold text-pink-700">
            All <span class="text-pink-500">Products</span>
        </h2>
        <p class="text-center text-pink-600 mt-2">
            Fresh, Sweet, and Made With Love
        </p>

        <div class="grid gap-10 mt-14 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($products as $product)
                <div class="bg-pink-50 rounded-2xl shadow-md hover:shadow-xl transition p-4">

                    <!-- PRODUCT IMAGE -->
                    <img 
                        src="{{ asset('storage/' . $product->thumbnail) }}" 
                        alt="{{ $product->name }}"
                        class="h-44 w-full object-cover rounded-xl"
                    >

                    <!-- PRODUCT INFO -->
                    <h3 class="text-xl font-semibold text-pink-800 mt-4">
                        {{ $product->name }}
                    </h3>

                    <p class="text-pink-600 text-sm mt-1 line-clamp-2">
                        {{ $product->description }}
                    </p>

                    <p class="text-pink-700 font-bold mt-2">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <!-- ACTION -->
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('products.show', $product->id) }}"
                           class="w-1/2 text-center border border-pink-400 text-pink-500 py-2 rounded-full hover:bg-pink-100 transition">
                            Detail
                        </a>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-1/2">
                            @csrf
                            <button 
                                type="submit"
                                class="w-full bg-pink-500 text-white py-2 rounded-full hover:bg-pink-600 transition">
                                Add
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <p class="col-span-4 text-center text-gray-400">
                    Produk belum tersedia
                </p>
            @endforelse
        </div>

    </div>
</section>

<!-- ================= CATEGORIES ================= -->
<section id="categories" class="py-20 bg-pink-50">
    <h2 class="text-center text-4xl font-bold text-pink-700">
        Product <span class="text-pink-500">Categories</span>
    </h2>

    <div class="max-w-7xl mx-auto px-6 mt-14 space-y-16">
        @foreach($categories as $category)
        <div>
            <h3 class="text-3xl font-bold text-pink-700 mb-6">
                {{ $category->name }}
            </h3>

            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($category->products as $product)
                <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-xl transition">
                    <img src="{{ asset('storage/'.$product->image) }}"
                         class="h-40 w-full object-cover rounded-xl">

                    <h4 class="text-lg font-semibold text-pink-800 mt-3">
                        {{ $product->name }}
                    </h4>

                    <p class="text-pink-600 text-sm h-12">
                        {{ Str::limit($product->description, 60) }}
                    </p>

                    <p class="font-bold text-pink-700 mt-2">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-pink-200 py-10">
    <div class="text-center">
        <h1 class="text-3xl font-bold text-pink-700">SweetCake</h1>
        <p class="text-pink-700 mt-2">Made with love & sweetness 💕</p>
        <p class="mt-6 text-pink-800">
            &copy; {{ date('Y') }} SweetCake — All Rights Reserved
        </p>
    </div>
</footer>

</body>
</html>