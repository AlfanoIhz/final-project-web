<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;   
use App\Model\MenusModels;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Retrieve the order from the session
        $order = session()->get('order', []);
        
        // Check if the order is empty
        if (empty($order)) {
            return redirect()->route('user.menu')->with('error', 'Your order is empty!');
        }

        // Calculate the total price
        $totalPrice = array_reduce($order, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

        // Validate the request
        $request->validate([
            'total_price' => 'required|numeric',
        ]);

        
        // Create a new order
        $newOrder = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $totalPrice,
        ]);

        
        // Create order items
        foreach ($order as $item) {
            $newOrder->items()->create([
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);  
        }
        
        // Reset order in session
        session()->forget('order');

        // Redirect with success message
        return redirect()->route('user.menu')->with('success', 'Order placed successfully!');
    }
}
