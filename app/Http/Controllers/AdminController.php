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
  
    return view('admin.admins.create');
}

public function store(Request $request)
{
    $data = $request->only(['name_en', 'name_ne', 'email', 'phone', 'role']);
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('admins/images', 'public');
    }
    $data['password'] = Hash::make($request->password);
    User::create($data);

    return redirect()->route('admins.index')->with('success', 'User created successfully.');
}

public function edit(User $user)
{
    return view('admin.admins.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $data = $request->only(['name_en', 'name_ne', 'email', 'phone', 'role']);
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('admins', 'public');
    }
    if ($request->password) {
        $data['password'] = bcrypt($request->password);
    }
    $user->update($data);

    return redirect()->route('admins.index')->with('success', 'User updated successfully.');
}

public function destroy($id)
{
    $user = User::findOrFail($id)->delete();
    return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
}

}
