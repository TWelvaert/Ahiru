<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit() 
    {
        $user = Auth::user();
        return Inertia::render('Settings/Account', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    } 
       
    public function update(Request $request) 
    {
        $user = Auth::user();

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
           // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ])->validate();

        $user->update([
            'name' => $request->name,
            'email' =>  $request->email,
        ]);

        Session::flash('message', 'Your personal info has been updated!');
        Session::flash('type', 'success');

        return Inertia::render('Settings/Account', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    } 

    public function update_password(Request $request) 
    {
        $user = Auth::user();

        Validator::make($request->all(), [
            'current_password' => ['required'],
            'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ])->validate(); 

        $hasher = app('hash');
        if ($hasher->check($request->old_password, $user->password)) 
        {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            Session::flash('message', 'Your password has been updated!');
            Session::flash('alert-class', 'alert-success');

            return Inertia::render('Settings/Account', [
                'name' => $user->name,
                'email' => $user->email,
            ]);
        } 
        else 
        {
            Session::flash('message', 'Invalid current password!');
            Session::flash('alert-class', 'alert-error');

            return Inertia::render('Settings/Account', [
                'name' => $user->name,
                'email' => $user->email,
            ]);
        }
    } 
}
