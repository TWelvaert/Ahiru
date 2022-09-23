<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index (User $user)
    {

        
        $collaborations = $user->advertisements()->get();
        $collaborations = $collaborations->sortByDesc('created_at')->take(5);

        // dd($user->id);
        // dd($collaboration);


        return Inertia::render('Profile',[
            'user' => $user,
            'collaborations' => $collaborations
        ]);

    }

    
}
