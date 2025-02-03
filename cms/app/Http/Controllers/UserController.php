<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
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
//        $validated = request()->validate([
//            'email' => $request->email,
//            'password' => $request->password
//        ]);
        $credentials = [
            $request->email,
            $request->password
        ];
        //return response()->json($credentials);

        if (auth()->attempt($credentials)) {
            $user = User::where('email', $request->email)->get();

            return response() -> json($user);
        }

        return response("failed");
    }
    public function logout(Request $request)
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }
}
