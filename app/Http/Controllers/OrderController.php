<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Pastikan model Order sudah ada
use App\Models\OrderItem; // Jika ada model OrderItem untuk item pesanan

class OrderController extends Controller
{
    // Fungsi untuk memproses pesanan
    public function placeOrder(Request $request)
    {
        // Ambil data pesanan dari session atau database
        $orders = session('orders', []);
        $total = array_sum(array_map(function ($order) {
            return $order['price'] * $order['quantity'];
        }, $orders));

        // Simpan pesanan ke database
        $order = Order::create([
            'table_number' => 4, // Contoh nomor meja
            'total_price' => $total,
            'status' => 'Pending',
        ]);

        // Tambahkan item ke pesanan
        foreach ($orders as $item) {
            $order->items()->create([
                'menu_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Kosongkan pesanan setelah disimpan
        session()->forget('orders');

        // Redirect ke halaman detail pemesanan
        return redirect()->route('order.details', $order->id);
    }

    // Fungsi untuk menampilkan detail pesanan
    public function orderDetails($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);
        return view('order.details', compact('order'));
    }
}
