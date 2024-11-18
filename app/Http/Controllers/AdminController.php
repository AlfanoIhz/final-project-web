<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenusModel;
use App\Http\Requests\AddMenuRequest;

class AdminController extends Controller
{
    
    public function index(Request $request)
    {
          // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login-form')->with('loginError', 'You must be logged in to access the dashboard.');
        }

        // Get the search input
        $search = $request->input('search');

        // Fetch menus, applying the search filter if present
        $menus = MenusModel::when($search, function ($query, $search) {
            return $query->where('menu_name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
        })->paginate(6);

        // Return the view with menus
        return view('admin.admin-dashboard', compact('menus'));
    }

    public function showAddMenu()
    {
        return view('admin/add-menu');
    }

    public function showEditMenu()
    {
        return view('admin/edit-menu');
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
            'image' => $imagePath ? $imageName : null, // Menyimpan nama file image
        ]);

        return redirect()->to('admin/dashboard')->with('success', 'Menu Added');
    }
}
