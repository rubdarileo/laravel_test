<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;

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
    $products = \App\Models\Product::all();
    
    return view('index', ['products' => $products]);
});

Route::resource('products', ProductController::class);
Route::get('products/{id}/comments', 'App\Http\Controllers\CommentController@index')->name('listComments');
Route::get('products/{id}/comments/create', 'App\Http\Controllers\CommentController@create')->name('createComments');
Route::post('products/{id}/comments/store', 'App\Http\Controllers\CommentController@store')->name('storeComments');
Route::get('products/{id}/comments/show/{comment_id}', 'App\Http\Controllers\CommentController@show')->name('showComments');
Route::patch('products/{id}/comments/update/{comment_id}', 'App\Http\Controllers\CommentController@update')->name('updateComments');
Route::delete('products/{id}/comments/destroy/{comment_id}', 'App\Http\Controllers\CommentController@destroy')->name('destroyComments');

//Route::get('products/{id}/comments', CommentController::class);