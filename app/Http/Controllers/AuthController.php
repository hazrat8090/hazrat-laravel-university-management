<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registration()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('auth.registration', ['roles' => $roles]);
    }
}
