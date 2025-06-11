<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

// Route::view('/', 'home')->name('home');
Route::get('/', function () {
    $categories = DB::table('categories')->get();
    return view('home', ['categories' => $categories]);
})->name('home');


Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('posts/{postId}', [PostController::class, 'show'])
//     ->name('post.show');

// Route::get('posts/{post}', [PostController::class, 'show'])
//     ->name('post.show');

Route::view('contact', 'contact')->name('contact');
Route::view('about', 'about')->name('about');
Route::view('article', 'article')->name('article');

Route::resource('posts', PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::resource('categories', CategoryController::class);




