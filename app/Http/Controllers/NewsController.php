<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\NewsArticle;
use App\Models\NewsCategories;
use App\Models\User;
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
        $newsArticles = NewsArticle::latest()
        ->paginate(8);
                    
        return Inertia::render('Admin/News/Articles', [
            'news_articles' => $newsArticles,
        ]);
    }

    public function show(NewsArticle $news_article)
    {   
        $user = Auth::user();
        return Inertia::render('Article', [
            'news_article' => $news_article,
            'news_comments' => $news_article->comments,
            'news_author' => $news_article->user,
        ]);
    }

    public function create()
    {
        $newsCategories = NewsCategories::all();
        $categories = [];

        foreach ($newsCategories as $category) {
            $categoryObject = ['id' => $category->id, 'name' => $category->name, 'slug' => $category->slug, 'checked' => false];
            array_push($categories, $categoryObject);
        }

        return Inertia::render('Admin/News/Create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

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
            'excerpt' => ['required', 'string'],
            'description' => ['required', 'string'],
        ])->validate();
 
        Session::flash('message', 'News article has been created!');
        Session::flash('flashtype', 'success');

        NewsArticle::create([
            'user_id' => $user->id,
            'slug' => str()->slug($request->title),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'category_id' => $categories,
        ]);

        return redirect('/admin/news');
    }

    public function edit(NewsArticle $news_article)
    {
        $newsCategories = NewsCategories::all();
        $all_categories = [];

        foreach ($newsCategories as $category) {
            $categoryObject = ['id' => $category->id, 'name' => $category->name, 'slug' => $category->slug, 'checked' => false];
            array_push($all_categories, $categoryObject);
        }

        $current_categories = explode(",", $news_article->category_id);
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

        return Inertia::render('Admin/Update', [
            'title' => $news_article->title,
            'slug' => $news_article->slug,
            'excerpt' => $news_article->excerpt,
            'description' => $news_article->description,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, NewsArticle $news_article)
    {
        $user = Auth::user();
        $categories_checked = [];
        $categories = $request->categories;
        
        foreach ($categories as $category) {
            if ($category['checked'] == true) {
                array_push($categories_checked, $category['id']);
            }
        }

        $categories = implode(",", $categories_checked);

        Validator::make($request->all(), [
            'slug' => ['required', 'string', 'max:255', Rule::unique('news_categories', 'slug')->ignore($news_article->id)],
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
            "category_id" => $categories,
            "user" => $user
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
