<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index(Request $request){

        $title = 'Users';

        // Ambil search input
        $search = $request->input('userSearch');

        // Fetch menus, applying the search filter if present
        $users = UserModel::query()
        ->when($search, function ($query) use ($search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('status', 'LIKE', "%{$search}%")
                        ->orWhere('role', 'LIKE', "%{$search}%");
        })->paginate(10);

        return view('admin.user-list', compact('users', 'title', 'search'));
    }

    public function activateUser($id){

        $user = UserModel::findorfail($id);

        if ($user->status == 'pending'|| $user->status == 'inactive'){
            $user->status = 'active';
        }else{
            return back()->with('error', "{$user->name}'s status is already activated.");
        }

        $user->save();
        return back()->with('success', "{$user->name}'s status has been activated.");
    }

    public function deactivateUser($id){

        $user = UserModel::findorfail($id);

        if ($user->status == 'pending'|| $user->status == 'active'){
            $user->status = 'inactive';
        }else{
            return back()->with('error', "{$user->name}'s status is already inactive.");
        }

        $user->save();
        return back()->with('success', "{$user->name}'s status has been inactivated.");
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);

        $user->delete();

        return back()->with('success', 'User Deleted');
    }
}
