<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ComentarioController;

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

Route::get('/', App\Http\Controllers\HomeController::class)->name('home');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'store']);
Route::post('/logout', [App\Http\Controllers\LogoutController::class, 'store'])->name('logout');

//rutas para el perfil
Route::get('/editar-perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [App\Http\Controllers\PerfilController::class, 'store'])->name('perfil.store');

Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/{user:username}/posts/{post}', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentarios.store');

Route::post('/imagenes', [App\Http\Controllers\ImagenController::class, 'store'])->name('imagenes.store');


//likes a las fotos
Route::post('/posts/{post}/likes', [App\Http\Controllers\LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [App\Http\Controllers\LikeController::class, 'destroy'])->name('posts.likes.destroy');

Route::get('/{user:username}', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

//Siguiendo Usuarios
Route::post('/{user:username}/follow', [App\Http\Controllers\FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [App\Http\Controllers\FollowerController::class, 'destroy'])->name('users.unfollow');
