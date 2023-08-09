<?php

use App\Http\Controllers\Admin\adminNewsController;
use App\Http\Controllers\Admin\CommentUserController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/contact', MessageController::class);
    Route::resource('/comment', CommentController::class);


    Route::resource('/comment_user', CommentUserController::class);

    Route::resource('/admin', adminNewsController::class);

    Route::resource('/logos', LogoController::class);

    Route::resource('/message', App\Http\Controllers\Admin\messageController::class);
});

Route::get('/', [newsController::class, 'index'])->name('home');
Route::get('/contact_us', [newsController::class, 'contact'])->name('contact');
Route::get('/blogs', [newsController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{id}', [newsController::class, 'show'])->name('show');




require __DIR__ . '/auth.php';
