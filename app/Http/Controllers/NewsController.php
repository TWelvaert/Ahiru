<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsArticle;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Session;

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
        return Inertia::render('Admin/Create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();


        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'unique:news_articles'],
            'title' => ['required', 'string'],
            'excerpt' => ['required', 'string'],
            'description' => ['required', 'string'],

        ])->validate();


        NewsArticle::create([
            'user_id' => $user->id,
            'slug' => $request->slug,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'description' => $request->description,
        ]);

        Session::flash('message', 'Your Advertisement is successfully made!');
        Session::flash('flashtype', 'success');

        return redirect('/admin/news');
    }

    public function edit(NewsArticle $news_article)
    {
        return Inertia::render('Admin/Update', [
            'title' => $news_article->title,
            'slug' => $news_article->slug,
            'excerpt' => $news_article->excerpt,
            'description' => $news_article->description,
        ]);
    }

    public function update(Request $request, NewsArticle $news_article)
    {
        $user = Auth::user();

        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'max:255', Rule::unique('freelance_advertisements', 'slug')->ignore($news_article->id)],
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ])->validate();


        $news_article->update([
            "user_id" => $user->id,
            "slug" => $request->slug,
            "title" => $request->title,
            "excerpt" => $request->excerpt,
            "description" => $request->description,

        ]);

        Session::flash('message', 'Your News Article was Updated successfully!');
        Session::flash('flashtype', 'success');

        return redirect('/admin/news');
    }

    public function destroy(NewsArticle $news_article)
    {
        $news_article->delete();

        Session::flash('message', 'Your News Article was Deleted successfully!');
        Session::flash('flashtype', 'success');

        return redirect('/admin/news');
    }
}
