<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Transaction::with('buyer')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('seller.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Transaction::with(['buyer', 'details.product'])
            ->findOrFail($id);

        return view('seller.orders.detail', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Transaction::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function updateResi(Request $request, $id)
    {
        $order = Transaction::findOrFail($id);
        $order->shipping_code = $request->shipping_code;
        $order->save();

        return back()->with('success', 'Nomor resi berhasil diperbarui.');
    }
}
