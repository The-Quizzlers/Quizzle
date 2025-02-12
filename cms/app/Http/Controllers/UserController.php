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
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($validated)) {
            $user = User::where('email', $request->email)->get();

            return response() -> json($user);
        }

        return response("failed");
    }

    public function level(Request $request)
    {
        $user = $request->user;
        $xp = $request->correct + $user->XP;

        if ($xp >= 100) {
            $newXP = $xp % 100;
            $level = ($xp - $newXP) / 100;

            User::where('id', $user->id)
                ->update([
                'XP' => $newXP,
                'level' => $level
                ]);
        } else {
            User::where('id', $user->id)
                ->update([
                'XP' => $xp
            ]);
        }

        return response()->json($user);
    }
    public function logout(Request $request)
    {
    }
}
