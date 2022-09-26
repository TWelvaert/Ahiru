<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Session;

class ProfileController extends Controller
{
  public function index (User $user)
    {
        $collaborations = $user->advertisements()->get();
        $collaborations = $collaborations->sortByDesc('created_at')->take(8);
        $profile = $user->profile()->get();
        return Inertia::render('Profile',[
            'user' => $user,
            'collaborations' => $collaborations,
            'profile' => $profile
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
