<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\NotifsController;
use App\Http\Controllers\WorkrecordsController;
use App\Http\Controllers\ObjectsController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AllUsersController;

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

Auth::routes();

Route::group(['middleware'=>['isAdmin']], function() {
    Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('logout', [LogoutController::class, 'perform']);
 });

Route::group(['middleware'=>['auth']], function(){
    Route::get('/', [PagesController::class, 'profile'])->name('profile');
    Route::resource('posts', PostsController::class);
    Route::get('objects', [ObjectController::class, 'objects']);
    Route::post('search', 'App\Http\Controllers\PagesController@search');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('objects', 'App\Http\Controllers\ObjectsController@index');
    Route::get('objects/create', 'App\Http\Controllers\ObjectsController@create')->middleware('isAdmin');
    Route::post('objects', 'App\Http\Controllers\ObjectsController@store')->middleware('isAdmin');
    Route::get('objects/{id}', 'App\Http\Controllers\ObjectsController@show');
    Route::get('objects/{id}/edit', 'App\Http\Controllers\ObjectsController@edit')->middleware('isAdmin');
    Route::put('objects/{id}', 'App\Http\Controllers\ObjectsController@update')->middleware('isAdmin');
    Route::delete('objects/{id}', 'App\Http\Controllers\ObjectsController@destroy')->middleware('isAdmin');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('notifications', 'App\Http\Controllers\NotifsController@index');
    Route::get('notifications/create', 'App\Http\Controllers\NotifsController@create')->middleware('isAdmin');
    Route::post('notifications', 'App\Http\Controllers\NotifsController@store')->middleware('isAdmin');
    Route::get('notifications/{id}', 'App\Http\Controllers\NotifsController@show');
    Route::get('notifications/{id}/edit', 'App\Http\Controllers\NotifsController@edit')->middleware('isAdmin');
    Route::put('notifications/{id}', 'App\Http\Controllers\NotifsController@update')->middleware('isAdmin');
    Route::delete('notifications/{id}', 'App\Http\Controllers\NotifsController@destroy')->middleware('isAdmin');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('work', 'App\Http\Controllers\WorkrecordsController@index');
    Route::get('work/create', 'App\Http\Controllers\WorkrecordsController@create')->middleware('isAdmin');
    Route::post('work', 'App\Http\Controllers\WorkrecordsController@store')->middleware('isAdmin');
    Route::get('work/{id}', 'App\Http\Controllers\WorkrecordsController@show');
    Route::get('work/{id}/edit', 'App\Http\Controllers\WorkrecordsController@edit')->middleware('isAdmin');
    Route::put('work/{id}', 'App\Http\Controllers\WorkrecordsController@update')->middleware('isAdmin');
    Route::delete('work/{id}', 'App\Http\Controllers\WorkrecordsController@destroy')->middleware('isAdmin');
});

Route::get('/users', [AllUsersController::class, 'index'], ['middleware' => ['isAdmin']]);