<?php


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
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {

    // Routes for regular users
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for admin users
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminHomeController::class, 'index'])
            ->middleware(['auth', 'verified'])
            ->name('admin.dashboard');
        // Add other admin routes here as needed
    });
});

require __DIR__.'/auth.php';



