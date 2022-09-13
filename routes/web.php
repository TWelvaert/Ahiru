<?php

use App\Http\Controllers\AdminAdvertisementController;
use App\Http\Controllers\FreelanceAdsController;
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


Route::get('/dashboard', [FreelanceAdsController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/advertisement/create', [FreelanceAdsController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('advertisement/create', [FreelanceAdsController::class, 'store'])->middleware(['auth', 'verified'])->name('advertisement/create');

Route::get('/advertisements', [FreelanceAdsController::class, 'colaberations'])->name('colaberations');

Route::get('/advertisement/{freelanceAdvertisement:slug}/edit', [FreelanceAdsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::post('/advertisement/update/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'update'])->middleware(['auth', 'verified']);

Route::get('/dashboard/advertisement/delete/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/advertisement/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'show']);



Route::get('settings/account', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'edit'])->name('settings/account');
Route::post('settings/account', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'update'])->name('settings/account');

Route::get('settings/uploads', [\App\Http\Controllers\UploadsController::class, 'index'])->name('settings/uploads');
Route::post('settings/uploads', [\App\Http\Controllers\UploadsController::class, 'upload'])->name('settings/uploads');
Route::get('settings/uploads/delete/{upload:id}', [\App\Http\Controllers\UploadsController::class, 'destroy']);

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

// ['auth', 'verified'] when logged in as a user

require __DIR__.'/auth.php';

Route::get('/', function () {
    return Inertia::render('Landing');
});

Route::get('/About', function () {
    return Inertia::render('About', );
});

Route::get('/Artists', function () {
    return Inertia::render('Artists');
});

Route::get('/Contact', function () {
    return Inertia::render('Contact');
});
