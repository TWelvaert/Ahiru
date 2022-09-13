<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Upload;
use File;

class UploadsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $uploads = Upload::where('user_id', '=', $user->id)->get();
        $uploads_images = [];
        $uploads_audio = [];

        foreach ($uploads as $upload) {

            if($upload->type == 'image') {
                array_push($uploads_images, $upload);
            }
            if($upload->type == 'audio') {
                array_push($uploads_audio, $upload);
            }
        }

        return Inertia::render('Settings/Uploads', [
            'uploads_images' => $uploads_images,
            'uploads_audio' => $uploads_audio
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

        $uploads = implode(",", $uploads);
    }

    public function destroy(Upload $upload)
    {
        $toDelete = "{$upload->path}/{$upload->name}";
        File::delete($toDelete);
        $upload->delete();
        return redirect('/settings/uploads');
    }


}
