<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class NewsCommentController extends Controller
{
    public function store(Request $request, NewsArticle $newsArticle)
    {
       
       $user_id = Auth::user()->id; 
        Validator::make($request->all(), [
            'comment' => ['required'],

        ])->validate();
        // dd($request->comment);
        Comment::create([
            'user_id' => $user_id,
            'news_article_id' => $newsArticle->id,
            'comment' => $request->comment,
        ]);
        

        return redirect(`news/article/$newsArticle->slug`);
    }
}
