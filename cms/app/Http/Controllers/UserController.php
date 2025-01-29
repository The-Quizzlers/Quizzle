<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json($user);
    }
    public function login(Request $request)
    {
        $validated = request()->validate([
            'email' => $request->name,
            'password' => $request->password
        ]);
        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('dashboard.index')->with('success', "Logged in successfully!");
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
