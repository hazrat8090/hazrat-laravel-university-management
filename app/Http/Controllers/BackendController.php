<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function showBackend()
    {
        $user = User::all();
        return view('backend.dashboard', ['user' => $user]);
    }
}
