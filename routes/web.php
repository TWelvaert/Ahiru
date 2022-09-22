<?php

use App\Http\Controllers\AdminAdvertisementController;
use App\Http\Controllers\FreelanceAdsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsCommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Models\FreelanceAdvertisement;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use function PHPSTORM_META\type;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Landing', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/{user:slug}', [ProfileController::class,'index'])
->name('profile');

// Route::get('/dashboard', [FreelanceAdsController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/advertisements', [FreelanceAdsController::class, 'collaborations'])->name('advertisements');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/advertisement/create', [FreelanceAdsController::class, 'create'])->middleware(['auth', 'verified'])->name('advertisement.create');
Route::post('advertisement/create', [FreelanceAdsController::class, 'store'])->middleware(['auth', 'verified'])->name('advertisement/create');

Route::get('/advertisement/{freelanceAdvertisement:slug}/edit', [FreelanceAdsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::post('/advertisement/update/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'update'])->middleware(['auth', 'verified']);

Route::get('/dashboard/advertisement/delete/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/advertisement/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'show']);





Route::get('/news/article/{news_article:slug}', [NewsController::class, 'show']);
Route::post('news/article/{news_article:slug}/comment', [NewsCommentController::class, 'store'])->name('comment');





///////////////////////////////////////////////////////////////////////////////////////////////////// ROUTES ADDED BY GYCH  
// ADMIN CONTROL PANEL ROUTES
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware(['auth']);

// NEWS ARTICLES
Route::get('/admin/news', [NewsController::class, 'admin_index'])->middleware(['auth', 'verified'])->name('admin/news');
Route::get('/admin/news/create', [NewsController::class, 'create'])->middleware(['auth', 'verified'])->name('admin/news/create');
Route::post('admin/news/create', [NewsController::class, 'store'])->middleware(['auth', 'verified'])->name('admin/news/create');
Route::get('/admin/news/{news_article:slug}/edit', [NewsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::post('/admin/news/{news_article:slug}/update', [NewsController::class, 'update'])->middleware(['auth', 'verified']);
Route::get('/admin/news/{news_article:slug}/delete', [NewsController::class, 'destroy'])->middleware(['auth', 'verified']);

// COLLABORATIONS
Route::get('/admin/collaborations', [\App\Http\Controllers\AdminController::class, 'index_collabs'])->middleware(['auth', 'verified'])->name('admin/collaborations');

// USERS
Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'index_users'])->middleware(['auth', 'verified'])->name('admin/users');
Route::get('admin/users/{user:slug}/edit', [\App\Http\Controllers\AdminController::class, 'edit_user'])->middleware(['auth', 'verified'])->name('{user:slug}/edit');
Route::post('admin/users/{user:slug}/edit', [\App\Http\Controllers\AdminController::class, 'update_user'])->middleware(['auth', 'verified']);
Route::get('admin/users/{user:slug}/delete', [\App\Http\Controllers\AdminController::class, 'destroy_user'])->middleware(['auth', 'verified'])->name('{user:slug}/delete');


Route::get('settings/account', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'edit'])->name('settings/account');
Route::post('settings/account', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'update'])->name('settings/account');
Route::get('settings/uploads', [\App\Http\Controllers\UploadsController::class, 'index'])->name('settings/uploads');
Route::post('settings/uploads', [\App\Http\Controllers\UploadsController::class, 'upload'])->name('settings/uploads');
Route::get('settings/uploads/delete/{upload:id}', [\App\Http\Controllers\UploadsController::class, 'destroy']);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/likes', function () {
    return Inertia::render('Likes');
})->name('likes');

// ['auth', 'verified'] when logged in as a user

require __DIR__.'/auth.php';

Route::get('/', function () {
    return Inertia::render('Landing');
});

Route::get('/About', function () {
    return Inertia::render('About');
});

// Route::get('/profile', function () {
//     return Inertia::render('Profile');
// })->name('profile');

Route::get('/Artists', function () {
    return Inertia::render('Artists');
});

Route::get('/Contact', function () {
    return Inertia::render('Contact');
});
