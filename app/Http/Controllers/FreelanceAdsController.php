<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\FreelanceCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Session;

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
        $freelanceCategories = FreelanceCategory::all();
        $categories = [];

        foreach ($freelanceCategories as $category) {
            $categoryObject = ['id' =>$category->id, 'name' =>$category->name, 'slug' =>$category->slug, 'checked' => false];
            array_push($categories, $categoryObject);
        }

        return Inertia::render('FreelanceAdvertisement/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        

        $categories_checked = [];
        $categories = $request->categories;

        foreach ($categories as $category) {
            if($category['checked'] === true) {
                array_push($categories_checked, $category['id']);
            }  
        }

  
        $categories = implode(",", $categories_checked);
        
        
        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'unique:freelance_advertisements'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ])->validate();

        // dd($categories);

        $atributes = new FreelanceAdvertisement();
        $atributes->user_id = $user->id;
        $atributes->category_id = $categories;
        $atributes->type = "advertisement";
        $atributes->slug = $request->slug;
        $atributes->title = $request->title;
        $atributes->description = $request->description;

        $atributes->save();

        Session::flash('message', 'Your personal info has been updated!');
        Session::flash('flashtype', 'success');

        return redirect('/dashboard');
    }

    public function edit(FreelanceAdvertisement $freelanceAdvertisement)
    {
        $freelanceCategories = FreelanceCategory::all();
        $categories = [];

        foreach ($freelanceCategories as $category) {
            $categoryObject = ['id' =>$category->id, 'name' =>$category->name, 'slug' =>$category->slug, 'checked' => false];
            array_push($categories, $categoryObject);
        }

        return Inertia::render('FreelanceAdvertisement/Update', [
            'title' => $freelanceAdvertisement->title,
            'slug' => $freelanceAdvertisement->slug,
            'description' => $freelanceAdvertisement->description,
            'category_id' => $freelanceAdvertisement->category_id,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, FreelanceAdvertisement $freelanceAdvertisement)
    {

        $user = Auth::user();

        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'max:255', Rule::unique('freelance_advertisements', 'slug')->ignore($freelanceAdvertisement->id)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ])->validate();


        $freelanceAdvertisement->update([
            "user_id" => $user->id,
            "category_id" => 1,
            "type" => "advertisement",
            "slug" => $request->slug,
            "title" => $request->title,
            "description" => $request->description,
        ]);

        return redirect('/dashboard');

    }


    public function destroy(FreelanceAdvertisement $freelanceAdvertisement)
    {

        $freelanceAdvertisement->delete();
        return redirect('/dashboard');
    }
}
