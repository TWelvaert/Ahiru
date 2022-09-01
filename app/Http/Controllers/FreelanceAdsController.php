<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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

    public function create()
    {
        return Inertia::render('FreelanceAdvertisement/Create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'max:255', 'unique:freelance_advertisements'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ])->validate();

        $atributes = new FreelanceAdvertisement();
        $atributes->user_id = $user->id;
        $atributes->category_id = 1;
        $atributes->type = "advertisement";
        $atributes->slug = $request->slug;
        $atributes->title = $request->title;
        $atributes->description = $request->description;

        $atributes->save();


        return redirect('/dashboard');
    }

    public function edit()
    {
        return Inertia::render('FreelanceAdvertisement/Update');
    }

    public function destroy(FreelanceAdvertisement $freelanceAdvertisement)
    {
         
        $freelanceAdvertisement->delete();
        return redirect('/dashboard');
    }
}
