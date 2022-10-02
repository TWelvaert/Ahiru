<?php

use App\Http\Controllers\AdminAdvertisementController;
use App\Http\Controllers\FreelanceAdsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\NewsCommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InboxController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\FreelanceAdvertisement;
use App\Models\Upload;
use App\Models\Profile;
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

Route::get('landing', function () {
    return Inertia::render('Landing', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('landing');

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile/{user:slug}', [ProfileController::class,'index'])->name('profile');
Route::post('/profile/update/{user:slug}', [ProfileController::class, 'update'])->middleware(['auth', 'verified']);



// Route::get('/dashboard', [FreelanceAdsController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/advertisements', [FreelanceAdsController::class, 'advertisements'])->name('advertisements');
Route::get('/dashboard/advertisements', [FreelanceAdsController::class, 'index'])->name('/dashboard/advertisements')->middleware(['auth', 'verified']);

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/music', [MusicController::class, 'index'])->name('music');

Route::get('/music/create', [MusicController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/music/delete/{track:id}', [MusicController::class, 'destroy'])->middleware(['auth', 'verified']);
Route::get('/music/edit/{track:id}', [MusicController::class, 'edit'])->middleware(['auth', 'verified']);
Route::post('/music/edit/{track:id}', [MusicController::class, 'update'])->middleware(['auth', 'verified']);
Route::post('music/create', [MusicController::class, 'store'])->middleware(['auth', 'verified']);
//Route::post('music/create','MusicController@store');



Route::get('/likes', [HomeController::class, 'index_likes'])->middleware(['auth', 'verified'])->name('likes');

Route::get('/inbox', [InboxController::class, 'index'])->middleware(['auth', 'verified'])->name('inbox');
Route::get('/inbox/message/{user:slug}', [InboxController::class, 'load_conversation'])->middleware(['auth', 'verified']);
Route::post('/inbox/message/{user:slug}', [InboxController::class, 'send_message'])->middleware(['auth', 'verified']);
Route::get('/inbox/message/{user:slug}/delete', [InboxController::class, 'soft_delete_message'])->middleware(['auth', 'verified']);

Route::get('/following', [HomeController::class, 'index_following'])->middleware(['auth', 'verified'])->name('following');


Route::get('/advertisement/create', [FreelanceAdsController::class, 'create'])->middleware(['auth', 'verified'])->name('advertisement.create');
Route::post('advertisement/create', [FreelanceAdsController::class, 'store'])->middleware(['auth', 'verified'])->name('advertisement/create');
Route::get('/advertisement/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'show'])->name('advertisement');
Route::get('/advertisement/{freelanceAdvertisement:slug}/edit', [FreelanceAdsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::post('/advertisement/update/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'update'])->middleware(['auth', 'verified']);

Route::get('/dashboard/advertisement/delete/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'destroy'])->middleware(['auth', 'verified']);



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
Route::post('/settings/account/password', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'update_password'])->name('settings/account/password');
Route::post('/settings/account/profile-picture', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'update_profile_picture'])->name('settings/account/profile-picture');
Route::get('settings/uploads', [\App\Http\Controllers\UploadsController::class, 'index'])->name('settings/uploads');
Route::post('settings/uploads', [\App\Http\Controllers\UploadsController::class, 'upload'])->name('settings/uploads');
Route::get('settings/uploads/delete/{upload:id}', [\App\Http\Controllers\UploadsController::class, 'destroy']);


Route::get('/user_data', function () {
    $user = Auth::user();
    $profile = $user->profile()->first();

    $profile_picture = 0;

    if($profile->profile_image != 0) {
        $profile_picture = Upload::Where('id', '=', $profile->profile_image)->first();
        $profile_picture = $profile_picture->name;
    }

    return [
        'user' => Auth::user(),
        'profile' => $profile_picture,
    ];});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
