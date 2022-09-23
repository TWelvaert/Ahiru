<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Upload;
use Session;
use Redirect;
use File;

class UploadsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_uploads = Upload::where('user_id', '=', $user->id)->get();

        return Inertia::render('Settings/Uploads', [
            'user' => $user,
            'user_uploads' => $user_uploads
        ]);
    }


    public function upload(Request $request)
    {
        $user = Auth::user();
        $files = [];
        $uploads = [];
        
        if ($request->uploads){
            foreach($request->uploads as $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('uploads'), $fileName);

                $fileNameParts = parse_url($fileName);
                $fileExtension = pathinfo($fileNameParts['path'], PATHINFO_EXTENSION);

                if (in_array($fileExtension, array('jpg', 'png', 'jpeg', 'gif'))) {
                    $fileType = 'image';
                } else if (in_array($fileExtension, array('mp3', 'wav'))) {
                    $fileType = 'audio';
                //} else if (in_array($fileExtension, array('mp4', 'avi', 'mov', 'wmv'))) {
                //    $fileType = 'video';
                } else {
                    dd('unknown file extension');
                }

                $upload = Upload::create([
                    'user_id' => $user->id,
                    'name' => $fileName,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => "uploads",
                    'type' => $fileType,
                ]);

                array_push($files, $fileName);
                array_push($uploads, $upload->id);
            }
        }

        $user_uploads = Upload::where('user_id', '=', Auth::user()->id)->get();

        Session::flash('message', 'Your file(s) have been uploaded!');
        Session::flash('flashtype', 'success');

        return redirect()->back();
    }

    public function destroy(Upload $upload)
    {
        $hostname = $_SERVER['REQUEST_URI'];
        $routes = explode("/delete", $hostname, 2);
        $route = $routes[0];

        $toDelete = "{$upload->path}/{$upload->name}";
        File::delete($toDelete);
        $upload->delete();

        $user_uploads = Upload::where('user_id', '=', Auth::user()->id)->get();

        return redirect()->back();
    }
}
