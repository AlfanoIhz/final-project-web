<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Return the view for the homepage
        return view('admin/admin-dashboard');
    }

    public function showAddMenu()
    {
        // Return the view for the homepage
        return view('admin/add-menu');
    }

    public function addMenu()
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'description' => 'required|string|email|max:255|unique:users',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'image' => 'image|file|max:2048',
        ]);

        // Meng-handle upload foto
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imeageName = time() . '_' . $image->getClientOriginalName();
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
