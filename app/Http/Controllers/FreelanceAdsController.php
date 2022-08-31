<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FreelanceAdsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $advertisements = FreelanceAdvertisement::all()->where('user_id', '=', $user->id);

        return Inertia::render('Dashboard', [
            'advertisements' => $advertisements,
        ]);
    }

    public function show(FreelanceAdvertisement $freelanceAdvertisement)
    {
        // TODO cash later
        // Cache::rememberForever('users', function () {
        // return DB::table('users')->get();
        // }); 
        
        
       

        return Inertia::render('Advertisement', [
        'advertisement' => $freelanceAdvertisement,
        ]);
    }

}
