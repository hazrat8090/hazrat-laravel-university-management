<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.users', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('backend.user.addUser', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->syncRoles($request->roles);
        return redirect('/users');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        $universities = University::pluck('id', 'id')->all();
        $userUniversityId = [$user->university_id];

        return view('backend.user.editUser', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'universities' => $universities,
            'userUniversityId' => $userUniversityId
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required',
            'university_id' => 'nullable|integer|exists:universities,id'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'university_id' => $request->university_id
        ];
        if (!empty($request->password)) {
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId)
    {
        $users = User::findOrFail($userId);
        $users->delete();
        return redirect('/users');
    }
}
