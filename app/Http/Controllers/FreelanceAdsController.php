<?php

namespace App\Http\Controllers;

use App\Models\FreelanceAdvertisement;
use App\Models\FreelanceCategory;
use App\Models\Upload;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use File;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Session;

class FreelanceAdsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $collaborations = FreelanceAdvertisement::all()->where('user_id', '=', $user->id);

        return Inertia::render('DashboardAds', [
            'user' => $user,
            'collaborations' => $collaborations,
        ]);
    }


    public function advertisements()
    {
        $collaborations = FreelanceAdvertisement::query()

            ->when(FacadesRequest::input('search'), function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->OrWhere('description', 'like', '%' . $search . '%');
            })->paginate(30)
            ->withQueryString();


        $collabs = [];

        foreach ($collaborations as $collaboration) {

            $uploads = explode(",", $collaboration->uploads);
            $uploadsResult = [];


            foreach ($uploads as $upload) {
                if (strlen($upload) > 0) {
                    $result = Upload::where('id', '=', $upload)->first();
                    $uploadsResult = $result;
                }
            }

            $collab = ['collab' => $collaboration, 'uploads' => $uploadsResult];


            array_push($collabs, $collab);
        }

        $categories = FreelanceCategory::all();
        $user = Auth::user();
        return Inertia::render(
            'Advertisements',
            [
                'user' => $user,
                'collabs' => $collabs,
                'categories' => $categories,
            ]
        );
    }


    public function show(FreelanceAdvertisement $freelanceAdvertisement)
    {
        $uploads = explode(",", $freelanceAdvertisement->uploads);
        $uploadsResult = [];


        foreach ($uploads as $upload) {
            if (strlen($upload) > 0) {
                $result = Upload::where('id', '=', $upload)->first();
                $uploadsResult = $result;
            }
        }

        $collab = ['collab' => $freelanceAdvertisement, 'uploads' => $uploadsResult];

        $user = Auth::user();
      
        return
            Inertia::render('Advertisement', [
                'advertisement' => $collab,
                'user' => $user,
                // 'uploads' => $uploads_matched,
            ]);
    }

    public function create()
    {

        $user = Auth::user();
        $user_uploads = Upload::where('user_id', '=', $user->id)->get();

        $freelanceCategories = FreelanceCategory::all();
        $categories = [];

        foreach ($freelanceCategories as $category) {
            $categoryObject = ['id' => $category->id, 'name' => $category->name, 'slug' => $category->slug, 'checked' => false];
            array_push($categories, $categoryObject);
        }

        return Inertia::render('FreelanceAdvertisement/Create', [
            'categories' => $categories,
            'user_uploads' => $user_uploads
        ]);
    }

    public function store(Request $request)
    {

        if ($request->uploads == null) {
            $uploads = 0;
        } else {
            $uploads = implode(",", $request->uploads);
        }

        $categories_checked = [];
        $categories = $request->categories;

        foreach ($categories as $category) {
            if ($category['checked'] == true) {
                array_push($categories_checked, $category['id']);
            }
        }

        $categories = implode(",", $categories_checked);

        Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],

        ])->validate();

        FreelanceAdvertisement::create([
            'user_id' => Auth::user()->id,
            'category_id' => $categories,
            'type' => 'advertisement',
            'slug' => str()->slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'uploads' => $uploads
        ]);

        Session::flash('message', 'Your Advertisement is successfully made!');
        Session::flash('flashtype', 'success');

        return redirect('/advertisements');
    }

    public function edit(FreelanceAdvertisement $freelanceAdvertisement)
    {
        $user = Auth::user();

        $freelanceCategories = FreelanceCategory::all();
        $all_categories = [];

        foreach ($freelanceCategories as $category) {
            $categoryObject = ['id' => $category->id, 'name' => $category->name, 'slug' => $category->slug, 'checked' => false];
            array_push($all_categories, $categoryObject);
        }

        $current_categories = explode(",", $freelanceAdvertisement->category_id);
        $categories = [];

        foreach ($all_categories as $all_category) {
            if (in_array($all_category['id'], $current_categories)) {
                $categoryObject2 = array('id' => $all_category['id'], 'name' => $all_category['name'], 'slug' => $all_category['slug'], 'checked' => true);
                array_push($categories, $categoryObject2);
            } else {
                $categoryObject2 = ['id' => $all_category['id'], 'name' => $all_category['name'], 'slug' => $all_category['slug'], 'checked' => false];
                array_push($categories, $categoryObject2);
            }
        }

        return
            Inertia::render('FreelanceAdvertisement/Update', [
                'user' => $user,
                'title' => $freelanceAdvertisement->title,
                'slug' => $freelanceAdvertisement->slug,
                'description' => $freelanceAdvertisement->description,
                'categories' => $categories,
                // 'uploads' => $uploads_matched,
            ]);
    }

    public function update(HttpRequest $request, FreelanceAdvertisement $freelanceAdvertisement)
    {

        $user = Auth::user();
        $files = [];
        // $uploads = [];

        // if ($request->uploads) {
        //     foreach ($request->uploads as $file) {
        //         $fileName = time() . rand(1, 99) . '.' . $file->extension();
        //         $file->move(public_path('uploads'), $fileName);

        //         $fileNameParts = parse_url($fileName);
        //         $fileExtension = pathinfo($fileNameParts['path'], PATHINFO_EXTENSION);

        //         if (in_array($fileExtension, array('jpg', 'png', 'jpeg', 'gif'))) {
        //             $fileType = 'image';
        //         } else if (in_array($fileExtension, array('mp3', 'wav'))) {
        //             $fileType = 'audio';
        //             //} else if (in_array($fileExtension, array('mp4', 'avi', 'mov', 'wmv'))) {
        //             //    $fileType = 'video';
        //         } else {
        //             dd('unknown file extension');
        //         }

        //         $upload = Upload::create([
        //             'user_id' => $user->id,
        //             'name' => $fileName,
        //             'path' => "uploads",
        //             'type' => $fileType,
        //         ]);

        //         array_push($files, $fileName);
        //         array_push($uploads, $upload->id);
        //     }
        // }

        // $uploads = implode(",", $uploads);
        // $uploads = "$freelanceAdvertisement->uploads,$uploads";

        $categories_checked = [];
        $categories = $request->categories;

        foreach ($categories as $category) {
            if ($category['checked'] == true) {
                array_push($categories_checked, $category['id']);
            }
        }

        $categories = implode(",", $categories_checked);

        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'max:255', Rule::unique('freelance_advertisements', 'slug')->ignore($freelanceAdvertisement->id)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ])->validate();


        $freelanceAdvertisement->update([
            "user_id" => $user->id,
            "category_id" => $categories,
            "type" => "advertisement",
            "slug" => $request->slug,
            "title" => $request->title,
            "description" => $request->description,
            // "uploads" => $uploads
        ]);

        Session::flash('message', 'Your Advertisement was Updated successfully!');
        Session::flash('flashtype', 'success');

        return redirect('/dashboard/advertisements');
    }


    public function destroy(FreelanceAdvertisement $freelanceAdvertisement)
    {
        $freelanceAdvertisement->delete();
        return redirect('/dashboard/advertisements');
    }
}
