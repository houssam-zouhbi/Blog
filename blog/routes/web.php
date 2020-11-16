<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});
Route::resource('articals','ArticalController');
Route::resource('homes','HomeController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\ArticalController::class, 'index'])->name('home');
Route::get('/add', [App\Http\Controllers\ArticalController::class, 'store'])->name('add');
Route::get('/myPosts', [App\Http\Controllers\ArticalController::class, 'create'])->name('myPosts');
Route::get('/destroy/{id}',[
    'uses' => 'App\Http\Controllers\ArticalController@destroy',
    'as'   => 'delete'
]);
Route::get('/show/{id}',[
    'uses' => 'App\Http\Controllers\ArticalController@show',
    'as'   => 'OnePost'
]);
Route::get('/store/{id}',[
    'uses' => 'App\Http\Controllers\CommentController@store',
    'as'   => 'addComment'
]);
// Route::get('/displayPost', [App\Http\Controllers\ArticalController::class, 'show'])->name('myPosts');
Route::get('states/{id}/displayPost', ['as' => 'displayPost', 'uses' => 'App\Http\Controllers\ArticalController@show']);




