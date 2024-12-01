<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenusModel;
use App\Http\Requests\AddMenuRequest;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Dashboard';

        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('admin.login-form')->with('loginError', 'You must be logged in to access the dashboard.');
        }

        $search = $request->input('searchInput');

        // Fetch menus, applying the search filter if present
        $menus = MenusModel::when($search, function ($query, $search) {
            return $query->where('menu_name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
        })->paginate(25);  

        // Format the price
        foreach ($menus as $menu) {
            $menu->formatted_price = $this->formatToRupiah($menu->price);
        }

        return view('admin.admin-dashboard', compact('menus', 'title', 'search'));
    }

    public function addMenu(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Save the image in 'uploads' folder
            $imagePath = $image->move(public_path('upload/menus-img'), $imageName);
        } else {
            $imagePath = null;
        }

        // Create the menu item
        MenusModel::create([
            'menu_name' => $request->menu_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath ? $imageName : null,
        ]);

        return redirect()->to('admin/dashboard')->with('success', 'Menu Added');
    }

    public function showEditMenu()
    {
        return view('admin/edit-menu', ['title' => 'Edit Menu']);
    }

    public function updateMenu(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        // Find the menu item by ID or fail
        $menu = MenusModel::findOrFail($id);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($menu->image) {
                Storage::delete($menu->image);
            }
            // Store the new image
            $menu->image = $request->file('image')->store('images');
        }

        // Update the menu item
        $menu->update([
            'menu_name' => $request->menu_name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Redirect with a success message
        return redirect()->route('admin.dashboard')->with('success', 'Menu Updated');
    }

    public function destroy($id)
    {
        $menu = MenusModel::findOrFail($id);

        // Delete the image if it exists and is stored in the public folder
        if (file_exists(public_path($menu->image)) && $menu->image !== null) {
            unlink(public_path($menu->image));
        }

        $menu->delete();

        return redirect()->to('admin/dashboard')->with('success', 'Menu Item Deleted');
    }

    // Function to format the price as Rupiah
    private function formatToRupiah($amount) {
        return number_format((float)$amount, 0, ',', '.');
    }
}