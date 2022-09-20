<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function index_users()
    {
         $users = User::paginate(15);

        return Inertia::render('Admin/Users/List', [
            'users' => $users,
        ]);
    }

    public function edit_user(User $user)
    {
        return Inertia::render('Admin/Users/Edit', [
            'name' => $user->name,
            'slug' => $user->slug,
            'email' => $user->email,
        ]);
    }

    public function update_user(Request $request, User $user) 
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
        ])->validate();

        $user->update([
            'name' => $request->name,
            'email' =>  $request->email,
        ]);

        Session::flash('message', 'Account has been updated!');
        Session::flash('flashtype', 'success');

        return Inertia::render('Admin/Users/Edit', [
            'name' => $user->name,
            'slug' => $user->slug,
            'email' => $user->email,
        ]);
    } 
}
