<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\FreelanceCategory;
use App\Models\Upload;
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
            $categoryObject = ['id' => $category->id, 'name' => $category->name, 'slug' => $category->slug, 'checked' => false];
            array_push($categories, $categoryObject);
        }

        return Inertia::render('FreelanceAdvertisement/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($request->uploads){
            foreach($request->uploads as $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('uploads'), $fileName);

                Upload::create([
                    'user_id' => $user->id,
                    'name' => $fileName,
                    'path' => "uploads",
                    'type' => "image",
                ]);

            }
        }
        
        $categories_checked = [];
        $categories = $request->categories;

        foreach ($categories as $category) {
            if ($category['checked'] === true) {
                array_push($categories_checked, $category['id']);
            }
        }

        $categories = implode(",", $categories_checked);

        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'unique:freelance_advertisements'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],

        ])->validate();
        

        // $freelanceAdvertisement = FreelanceAdvertisement::create([
        //     'user_id' => $user->id,
        //     'category_id' => $categories,
        //     'type' => 'advertisement',
        //     'slug' => $request->slug,
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'uploads' => $request->uploads
        // ]);

        Session::flash('message', 'Your Advertisement is successfully made!');
        Session::flash('flashtype', 'success');

        return redirect('/dashboard');
    }

    public function edit(FreelanceAdvertisement $freelanceAdvertisement)
    {
        $freelanceCategories = FreelanceCategory::all();
        $all_categories = [];

        foreach ($freelanceCategories as $category) {
            $categoryObject = ['id' => $category->id, 'name' => $category->name, 'slug' => $category->slug, 'checked' => false];
            array_push($all_categories, $categoryObject);
        }

        $current_categories = explode(",", $freelanceAdvertisement->category_id);
        $categories = [];

        foreach ($all_categories as $all_category) {
            foreach ($current_categories as $current_category) {
                if ($all_category['id'] == $current_category) {
                    $categoryObject2 = array('id' => $all_category['id'], 'name' => $all_category['name'], 'slug' => $all_category['slug'], 'checked' => true);
                    array_push($categories, $categoryObject2);
                }
            }
            $categoryObject2 = ['id' => $all_category['id'], 'name' => $all_category['name'], 'slug' => $all_category['slug'], 'checked' => false];
            array_push($categories, $categoryObject2);
        }

        return Inertia::render('FreelanceAdvertisement/Update', [
            'title' => $freelanceAdvertisement->title,
            'slug' => $freelanceAdvertisement->slug,
            'description' => $freelanceAdvertisement->description,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, FreelanceAdvertisement $freelanceAdvertisement)
    {

        $user = Auth::user();
        $categories_checked = [];
        $categories = $request->categories;

        foreach ($categories as $category) {
            if ($category['checked'] === true) {
                array_push($categories_checked, $category['id']);
            }
        }

        $categories = implode(",", $categories_checked);

        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'max:255', Rule::unique('freelance_advertisements', 'slug')->ignore($freelanceAdvertisement->id)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ])->validate();


        $freelanceAdvertisement->update([
            "user_id" => $user->id,
            "category_id" => $categories,
            "type" => "advertisement",
            "slug" => $request->slug,
            "title" => $request->title,
            "description" => $request->description,
        ]);

        Session::flash('message', 'Your Advertisement was Updated successfully!');
        Session::flash('flashtype', 'success');

        return redirect('/dashboard');
    }


    public function destroy(FreelanceAdvertisement $freelanceAdvertisement)
    {

        $freelanceAdvertisement->delete();
        return redirect('/dashboard');
    }

    // public function handleUpload(Request $request)
    // {
    //     if ($request->hasFile('photos')) {
    //         $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
    //         $files = $request->file('photos');
    //         foreach ($files as $file) {
    //             $filename = $file->getClientOriginalName();
    //             $extension = $file->getClientOriginalExtension();
    //             $check = in_array($extension, $allowedfileExtension);
    //             //dd($check);
    //             if ($check) {
    //                 $items = Item::create($request->all());
    //                 foreach ($request->photos as $photo) {
    //                     $filename = $photo->store('photos');
    //                     Upload::create([
    //                         'item_id' => $items->id,
    //                         'filename' => $filename
    //                     ]);
    //                 }
                    
    //             }
    //         }
    //     }
    // }
}
