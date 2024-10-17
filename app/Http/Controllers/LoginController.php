<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request, $university_id)
    {
        $authorization = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $authorization['email'], 'password' => $authorization['password']])) {
            /** @var \App\Models\User */
            $user = Auth::user();

            // Check role and university ID
            if ($user->hasRole('super-admin') && $user->university_id == -1) {
                return redirect()->route('superadmin.dashboard');
            } else if ($user->hasRole('kabul-university-officer') && $user->university_id == $authorization['university_id']) {
                return redirect()->route('universityAdmin.dashboard');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'These authorization do not match our records.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'The provided authorization do not match our records.',
        ]);
    }
}
