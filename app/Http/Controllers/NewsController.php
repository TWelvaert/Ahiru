<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsArticle;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NewsController extends Controller
{
    //
    public function admin_index()
    {
        $user = Auth::user();
        $newsArticles = NewsArticle::all()->where('user_id', '=', $user->id);

        return Inertia::render('News', [
            'news_articles' => $newsArticles,
        ]);
    }

    public function show(NewsArticle $news_article)
    {
        return Inertia::render('Article', [
            'news_articles' => $news_article,
            
        ]);
    }

    public function create()
    {
        return "hallo";
    }
}
