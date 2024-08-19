<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $roleNames = [
            1 => 'Admin',
            2 => 'Mekanik',
            3 => 'User'
        ];

        foreach ($users as $user) {
            $user->role_name = $roleNames[$user->role_id] ?? 'Tidak ada role';
        }

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = [
            1 => 'Admin',
            2 => 'Mekanik',
            3 => 'User'
        ];

        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|integer|in:1,2,3'
        ], [
            'password.min' => 'Password harus memiliki panjang minimal 8 karakter.',
            'password.confirmed' => 'Konfrimasi Password Tidak Sesuai'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id) {
        $user = User::findOrFail($id);

        // Menentukan nama peran

        $roles = [
            1 => 'Admin',
            2 => 'Mekanik',
            3 => 'User'
        ];

        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|integer|in:1,2,3'
        ],[
            'password.min' => 'Password harus memiliki panjgan minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.'
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        if($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User Berhasil diperbarui.');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        
        if($user->role_id !== 2) {
            return redirect()->route('user.index')->with('error', 'Hanya Mekanik yang bisa dihapus.');
        }

        $user->delete();
        return redirect()->route('user.index')->with('Success', 'User Berhasil dihapus');
    }
}