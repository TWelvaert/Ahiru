<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Upload;
use App\Models\Profile;
use App\Models\PrivateMessage;

class InboxController extends Controller
{
    public function index() {
        $user = Auth::user();

        $user_auth_messages1 = $user->messages()->get();
        $user_auth_messages2 = PrivateMessage::Where('to_user', '=', $user->id)->get();

        $all_messages = $user_auth_messages1->merge($user_auth_messages2);
        $all_messages = $all_messages->sortByDesc('created_at');
        $all_messages = $all_messages->unique('to_user');
        $all_messages = $all_messages->toArray();

        foreach ($all_messages as $key => $message) {
            $to_user = $message['to_user'];
            foreach ($all_messages as $key2 => $message2) {
                if($message2['user_id'] == $message['to_user'] && $message2['to_user'] == $message['user_id']) {
                    if($message2['created_at'] < $message['created_at']) {
                        unset($all_messages[$key2]);
                    } else {
                        unset($all_messages[$key]);
                    }
                }                
            }
        }

        foreach ($all_messages as $key => $message) {
            if($message['to_user'] == $user->id) {
                $message['to_user'] = $message['user_id'];
            } 
            
            $to_user_profile_img_id = 0;

            $to_user = User::Where('id', '=', $message['to_user'])->get();
            $all_messages[$key]['to_user'] = $to_user[0];
            $to_user_profile = $all_messages[$key]['to_user']->profile()->get();
            $to_user_profile_img_id = $to_user_profile[0]['profile_image'];

            if($to_user_profile_img_id != 0) {
                $to_user_profile_img = Upload::Where('id', '=', $to_user_profile_img_id)->get();
            }

            $to_user_profile_img = $to_user_profile_img[0]['name'];
            $all_messages[$key]['to_user'] = collect($all_messages[$key]['to_user'])->merge(['profile_picture' => $to_user_profile_img]);
        }
       
        return Inertia::render('Inbox', [
            'user' => $user,
            'user2' => 0,
            'all_messages' => $all_messages,
        ]); 
    }


    public function load_conversation(User $user) {

        $user_auth = Auth::user();

        $user_auth_messages1 = $user_auth->messages()->get();
        $user_auth_messages2 = PrivateMessage::Where('to_user', '=', $user_auth->id)->get();

        $all_messages = $user_auth_messages1->merge($user_auth_messages2);
        $all_messages = $all_messages->sortByDesc('created_at');
        $all_messages = $all_messages->unique('to_user');
        $all_messages = $all_messages->toArray();


        if(count($all_messages) > 0) {
            foreach ($all_messages as $key => $message) {
                $to_user = $message['to_user'];
                foreach ($all_messages as $key2 => $message2) {
                    if($message2['user_id'] == $message['to_user'] && $message2['to_user'] == $message['user_id']) {
                        if($message2['created_at'] < $message['created_at']) {
                            unset($all_messages[$key2]);
                        } else {
                            unset($all_messages[$key]);
                        }
                    }                
                }
            }

            foreach ($all_messages as $key => $message) {
                if($message['to_user'] == $user_auth->id) {
                    $message['to_user'] = $message['user_id'];
                } 

                $to_user_profile_img_id = 0;
                $to_user_profile_img;
                $to_user = User::Where('id', '=', $message['to_user'])->get();
                $all_messages[$key]['to_user'] = $to_user[0];
                $to_user_profile = $all_messages[$key]['to_user']->profile()->get();
                $to_user_profile_img_id = $to_user_profile[0]['profile_image'];
    
                if($to_user_profile_img_id != 0) {
                    $to_user_profile_img = Upload::Where('id', '=', $to_user_profile_img_id)->get();
                    $to_user_profile_img = $to_user_profile_img[0]['name'];
                    $all_messages[$key]['to_user'] = collect($all_messages[$key]['to_user'])->merge(['profile_picture' => $to_user_profile_img]);
                } else {
                    $all_messages[$key]['to_user'] = collect($all_messages[$key]['to_user'])->merge(['profile_picture' => 0]);
                }
            }  
        }


        $user2_profile = Profile::Where('user_id', '=', $user->id)->get();
//dd($user2_profile[0]->profile_image);
        $user2_profile_img = 0; 

        if($user2_profile[0]->profile_image != 0) {
            $user2_profile_img = Upload::Where('id', '=', $user2_profile[0]->profile_image)->get();
            $user2_profile_img = $user2_profile_img[0]->name;
        }
        
  

        $user_auth_messages = PrivateMessage::Where([['user_id', '=',  $user_auth->id],['to_user', '=', $user->id]])->get();
        $user2_messages = PrivateMessage::Where([['user_id', '=',  $user->id],['to_user', '=', $user_auth->id]])->get();
        $messages = $user_auth_messages->merge($user2_messages);
        $messages = $messages->sortBy('created_at');
        $messages = $messages->toArray();

        $messages_final = [];

        foreach ($messages as $key => $message) {
            array_push($messages_final, $message);
        }

       
           
        return Inertia::render('Inbox', [
            'user_auth' => $user_auth,
            'user2' => $user,
            'user2_profile_img' => $user2_profile_img,
            'messages' => $messages_final,
            'all_messages' => $all_messages,
        ]); 
    }

    
    public function send_message(Request $request) 
    {
        $user = Auth::user();

        $message = $request->message;
        $to_user = $request->to;

        PrivateMessage::create([
            'user_id' => $user->id,
            'to_user' => $to_user['id'],
            'message' => $message,
        ]);

        return $request;
        
    } 

    public function soft_delete_message(User $user) 
    {
        dd($user);

      //  $messages = PrivateMessage::Where([['user_id', '=',  $user->id],['to_user', '=', $user_auth->id]])->get();

        return redirect()->route('inbox');
        
    } 
}
