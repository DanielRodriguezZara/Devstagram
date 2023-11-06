<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.post');

Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');


Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentario.store');

Route::post('imagen',[ImagenController::class, 'store'])->name('imagen.store');

Route::post('/post/{post}', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/post/{post}', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');

