<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {

    // since you have two type of users you should use routes for /admin and / for users

    // create Folder on Controllers called Admin and create a new HomeController on it there you should put the admin dashboard and needed functions
    // and leave a HomeController for users that redirect to the user dashboard

    // had route hna 3adl fih dik xi d admin kaml 
    // Route::prefex('admin')->group(function () {
    //     Route::get('/dashboard', function () {
    //         return view('admin.dashboard');
    //     })->middleware(['auth', 'verified'])->name('admin.dashboard');
    // });


    // o hada khalih l users 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
