<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Session;

class ProfileController extends Controller
{
  public function index (User $user)
    {

        $collaborations = $user->advertisements()->get();

        $collaborations = $collaborations->sortByDesc('created_at')->take(8);
        $followers = User::orderBy('created_at', 'desc')->take(5)->get();

        $followProfileData = [];

        foreach ($followers as $follow) {
            $profile = $follow->profile()->get();
            $followProfileArray = ['follow' => $follow, 'profile' => $profile[0]];
            array_push($followProfileData, $followProfileArray);
        }
        
        $profile = $user->profile()->get();

        $auth = Auth::user();

        return Inertia::render('Profile',[
            'user' => $user,
            'collaborations' => $collaborations,
            'profile' => $profile,
            'followProfileData' => $followProfileData,
            'auth' => $auth
        ]);


    }

    public function update(Request $request, User $user)
    {
       
        $profile = $user->profile()->get(); 
        
        $profile[0]->update([
            "bio" => $request->profile[0]['bio'],
        ]);


        Session::flash('message', 'Your Profile was Updated successfully!');
        Session::flash('flashtype', 'success');

        return redirect()->back();
    }

    
}
