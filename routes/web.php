<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function()
{ 
    Route::get('/dashboard',    'App\Http\Controllers\PostsController@index')                ->name('dashboard');
    Route::get('/post/create',  'App\Http\Controllers\PostsController@create')               ->name('createPosts');
    Route::post('/post/add',    'App\Http\Controllers\PostsController@createUserPosts')      ->name('addPost');
    Route::post('/comment/add', 'App\Http\Controllers\CommentsController@createPostComment') ->name('addComments');
});
  
require __DIR__.'/auth.php';
