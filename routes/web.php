<?php

use App\Http\Controllers\AdminAdvertisementController;
use App\Http\Controllers\FreelanceAdsController;
use App\Models\FreelanceAdvertisement;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [FreelanceAdsController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/advertisement/create', [FreelanceAdsController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('advertisement/create', [FreelanceAdsController::class, 'store'])->middleware(['auth', 'verified'])->name('advertisement/create');

//Route::get('/advertisement/update', [FreelanceAdsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::get('/advertisement/{freelanceAdvertisement:slug}/edit', [FreelanceAdsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::post('/advertisement/update/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'update'])->middleware(['auth', 'verified']);

Route::get('/dashboard/advertisement/delete/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/advertisement/{freelanceAdvertisement:slug}', [FreelanceAdsController::class, 'show']);


require __DIR__.'/auth.php';
