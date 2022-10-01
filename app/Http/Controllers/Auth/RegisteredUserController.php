<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Models\Upload;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
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
            'slug' => str()->slug($request->name),
            'email' => $request->email,
            'slug' => str()->slug($request->name),
            'password' => Hash::make($request->password),
            'rank' => 'user',
        ]);

        event(new Registered($user));
        Auth::login($user);
        $user = Auth::user();

        Profile::create([
            'user_id' => $user->id,
            'profile_image' => 'assets/img/default.png',
            'bio' => ''
        ]);



        return redirect(RouteServiceProvider::HOME);
    }

    public function edit() 
    {
        $user = Auth::user();
        $user_uploads = Upload::where('user_id', '=', $user->id)->get();
        $uploads_images = [];
        foreach ($user_uploads as $upload) {
            if($upload['type'] == 'image') {
                array_push($uploads_images, $upload);
            }
        }

        $profile = $user->profile()->get();
        $profile_image_id = $profile[0]->profile_image;
        $profile_image = 0;

        if($profile_image_id > 0) {
            $profile_image = Upload::where('id', '=', $profile_image_id)->get();
            $profile_image = $profile_image[0]->name;
        }

        return Inertia::render('Settings/Account', [
            'user' => $user,
            'user_uploads' => $uploads_images,
            'profile_image' => $profile_image
        ]);
    } 
       
    public function update(Request $request) 
    {
        $user = Auth::user();

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
        ])->validate();

        $user->update([
            'name' => $request->name,
            'email' =>  $request->email,
        ]);

        Session::flash('message', 'Your personal info has been updated!');
        Session::flash('flashtype', 'success');

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
            Session::flash('flashtype', 'success');

            return Inertia::render('Settings/Account', [
                'name' => $user->name,
                'email' => $user->email,
            ]);
        } 
        else 
        {
            Session::flash('message', 'Invalid current password!');
            Session::flash('flashtype', 'error');

            return Inertia::render('Settings/Account', [
                'name' => $user->name,
                'email' => $user->email,
            ]);
        }
    }
    
    public function update_profile_picture(Request $request) 
    {
        $user = Auth::user();
        $profile = $user->profile()->get();

        $profile[0]->update([
            'profile_image' => $request->picture,
        ]);

        return $request;
        
    } 

} 