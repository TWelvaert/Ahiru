<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function show () 
    {  
        // $user = User::Auth();
        // $collaboration = FreelanceAdvertisement::where('user_id','=',$user->id);
        // dd($user); 
        // dd($collaboration); 

        
        return Inertia::render('Profile');
        
    }
}
