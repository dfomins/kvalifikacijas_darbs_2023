<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\NotifsController;
use App\Http\Controllers\LogoutController;

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

//Route::resource('posts', PostsController::class);
//Route::resource('notifications', NotifsController::class);

Auth::routes();

Route::group(['middleware'=>['isAdmin']], function() {
    Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');
});

Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('logout', [LogoutController::class, 'perform']);
 });

Route::group(['middleware'=>['auth']], function(){
    Route::get('profile', [PagesController::class, 'profile'])->name('profile');
    Route::resource('posts', PostsController::class);
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('notifications', 'App\Http\Controllers\NotifsController@index');
    Route::get('notifications/create', 'App\Http\Controllers\NotifsController@create')->middleware('isAdmin');
    Route::post('notifications', 'App\Http\Controllers\NotifsController@store')->middleware('isAdmin');
    Route::get('notifications/{id}', 'App\Http\Controllers\NotifsController@show');
    Route::get('notifications{id}/edit', 'App\Http\Controllers\NotifsController@edit')->middleware('isAdmin');
    Route::put('notifications/{id}', 'App\Http\Controllers\NotifsController@update')->middleware('isAdmin');
    Route::delete('notifications/{id}', 'App\Http\Controllers\NotifsController@destroy')->middleware('isAdmin');
});