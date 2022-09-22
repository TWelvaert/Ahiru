<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\FreelanceAdvertisement;
use Inertia\Inertia;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function index_collabs()
    {
         $collabs = FreelanceAdvertisement::paginate(15);

        return Inertia::render('Admin/Collaborations/List', [
            'collabs' => $collabs,
        ]);
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
            'slug' => str()->slug($user->name),
            'email' =>  $request->email,
        ]);

        Session::flash('message', 'Account has been updated!');
        Session::flash('flashtype', 'success');

        return redirect("/admin/users/$user->slug/edit");
    } 

    public function destroy_user(User $user)
    {
        $user->delete();

        Session::flash('message', 'User has been deleted !');
        Session::flash('flashtype', 'success');

        $users = User::paginate(15);

        return redirect("/admin/users");
    }
}
