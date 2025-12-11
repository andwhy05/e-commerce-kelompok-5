<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('checkout.index', compact('product'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'address' => 'required',
            'shipping' => 'required'
        ]);

        $transaction = Transaction::create([
    'user_id' => $request->user()->slug,
    'total' => 100000,
    'address' => $request->address,
    'shipping_method' => $request->shipping
]);



        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'product_id' => $request->product_id,
            'qty' => 1
        ]);

        return redirect()->route('home')->with('success', 'Pembelian berhasil!');
    }
}
<<<<<<< HEAD
} 
=======
}
>>>>>>> 5f24dfacd3d5dea8fab3c85ad374ae9a9570c542
