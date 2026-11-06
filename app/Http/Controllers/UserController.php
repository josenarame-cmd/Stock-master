<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        // For demo, use email from query params or default to first user
        $email = request()->get('email', 'josenarame@gmail.com');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = User::first();
        }

        return view('profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('profile', ['email' => $user->email])->with('success', 'Profile updated successfully!');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function editRole($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit_role', compact('user'));
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'role' => 'required|in:admin,manager,staff',
        ]);

        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'User role updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting the last admin
        if ($user->role === 'admin' && User::where('role', 'admin')->count() <= 1) {
            return redirect()->route('users.index')->with('error', 'Cannot delete the last admin user.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
