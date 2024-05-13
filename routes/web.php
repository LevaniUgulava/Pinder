<?php

use App\Http\Controllers\Auth\Authcontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\System\LikeController;
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
    return redirect('/register');
});
//----------------------------------------------
//view auth                                    |
//----------------------------------------------

Route::get('/register', [Authcontroller::class, 'Register']);
Route::get('/login', [Authcontroller::class, 'Login']);
Route::match(['get', 'post'], '/logout', [Authcontroller::class, 'Logout'])->name('logout');

//other AuthRoute
Route::post('/store', [Authcontroller::class, 'store'])->name('user.register');
Route::post('/auth', [Authcontroller::class, 'auth'])->name('user.auth');

//----------------------------------------------
//view profile                                 |
//----------------------------------------------

Route::get('/home', [ProfileController::class, 'home'])->name('home');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

//other ProfileRoute
Route::post('/user/update', [ProfileController::class, 'userupdate'])->name('user.update');
//----------------------------------------------
//view post                                    |
//----------------------------------------------
//perosnal posts
Route::get('/post', [PostController::class, 'post'])->name('post');
//all
Route::get('/postfind', [PostController::class, 'allpost'])->name('find.post');

//other PostRoute
Route::post('/post/store', [PostController::class, 'poststore'])->name('post.store');

Route::post('/like/{id}', [LikeController::class, 'like'])->name('like');
Route::post('/unlike/{id}', [LikeController::class, 'unlike'])->name('unlike');

Route::get('/likedpost', [LikeController::class, 'likedpost'])->name('liked.post');
Route::get('/wholiked/{id}', [LikeController::class, 'wholike'])->name('who.like');

Route::match(['get', 'post'], '/acept/{user}/{follower}', [LikeController::class, 'add'])->name('accept');

Route::get('/followers', [LikeController::class, 'Followers'])->name('Follower');


