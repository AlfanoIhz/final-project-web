<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenusModel;

class MenuController extends Controller
{
    public function index()
    {
        // Ambil semua data menu
        $menus = MenusModel::all();
        $orders = session()->get('order', []); // Dapatkan orders dari session
        $total = array_reduce($orders, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

        return view('user.menu-page', compact('menus', 'orders', 'total'));
    }

    public function addToOrder($id)
    {
        $menu = MenusModel::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu not found.');
        }

        $order = session()->get('order', []);
        
        if (isset($order[$id])) {
            $order[$id]['quantity']++;
        } else {
            $order[$id] = [
                "name" => $menu->menu_name,
                "price" => $menu->price,
                "quantity" => 1,
            ];
        }

        session()->put('order', $order);

        return redirect()->back()->with('success', 'Menu added to order.');
    }

    public function showOrder()
    {
        $order = session()->get('order', []);
        $total = array_reduce($order, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

        return view('order', compact('order', 'total'));
    }
}
