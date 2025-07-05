<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 1 && Auth::user()->role !== 0) {
            abort(403, 'Unauthorized');
        }

        $admins = User::all();
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {

        if (Auth::user()->role !== 0) {
            abort(403, 'Unauthorized');
        }

        return view('admin.admins.create');
    }

    // public function store(Request $request)
// {
//     $data = $request->only(['name_en', 'email', 'phone', 'role']);
//  if ($request->hasFile('image')) {
//     $file = $request->file('image');
//     $filename = time() . '_' . $file->getClientOriginalName();
//     $file->move(public_path('admins/images/'), $filename);

    //     $data['image'] = 'admins/images/' . $filename; // Save relative path
// }
//     $data['password'] = Hash::make($request->password);
//     User::create($data);

    //     return redirect()->route('admins.index')->with('success', 'User created successfully.');
// }
    public function store(Request $request)
    {
        // Validate fields
        $request->validate([
            'name_en' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:20|unique:users,phone',
            'password' => 'required|string|min:6',
            'role' => 'required|in:1,2',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB max
        ]);

        // Extract data
        $data = $request->only(['name_en', 'email', 'phone', 'role']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admins/images/'), $filename);
            $data['image'] = 'admins/images/' . $filename;
        }

        // Hash password
        $data['password'] = Hash::make($request->password);

        // Create user
        User::create($data);

        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }
    public function edit(User $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, User $user)
    {
        // Validate input
        // $request->validate([
        //     'name_en' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        //     'phone' => 'nullable|string|max:20|unique:users,phone,' . $user->id,
        //     'role' => 'required|in:1,2',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        //     'password' => 'nullable|string|min:6',
        // ]);

        $data = $request->only(['name_en', 'email', 'phone', 'role']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('admins/images/'), $filename);
            $data['image'] = 'admins/images/' . $filename;
        }

        // Hash new password if entered
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update user
        $user->update($data);

        return redirect()->route('admins.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }

}
