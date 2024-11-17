<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenusModel;
use App\Http\Requests\AddMenuRequest;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (auth()->check()) {
            return view('admin.admin-dashboard');
        }

        return redirect()->route('login-form')->with('loginError', 'You must be logged in to access the dashboard.');
    }

    public function showAddMenu()
    {
        // Return the view for the homepage
        return view('admin/add-menu');
    }

    public function addMenu(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'nullable|image|max:2048',
        ]);

        // Meng-handle upload foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Menyimpan file foto di folder 'uploads'
            $imagePath = $image->move(public_path('upload/menus-img'), $imageName);
        } else {
            $imagePath = null;
        }

        // Hash the password and create the user
        MenusModel::create([
            'menu_name' => $request->menu_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
        ]);

        return redirect()->to('admin/dashboard')->with('success', 'Menu Added');
    }
}
