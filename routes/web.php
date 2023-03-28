<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
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

Auth::routes(['login' => false, 'register' => false, 'logout' => false]);

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('/', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::group(['middleware'=>['isAdmin']], function() {
    Route::get('registracija', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
    Route::post('registracija', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');
    Route::get('lietotaji', [AllUsersController::class, 'index'])->name('allusers');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('profils', [ProfileController::class, 'profile'])->name('profile');
    Route::get('iziet', [LogoutController::class, 'perform'])->name('logout');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('profila_iestatijumi', [ProfileController::class, 'edit_profile'])->name('edit_profile');
    Route::post('profila_iestatijumi', [ProfileController::class, 'update_profile'])->name('update_profile');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('piezimes', 'App\Http\Controllers\PostsController@index')->name('posts');
    Route::get('piezimes/jauns', 'App\Http\Controllers\PostsController@create');
    Route::post('piezimes', 'App\Http\Controllers\PostsController@store');
    Route::get('piezimes/{id}', 'App\Http\Controllers\PostsController@show');
    Route::get('piezimes/{id}/rediget', 'App\Http\Controllers\PostsController@edit');
    Route::put('piezimes/{id}', 'App\Http\Controllers\PostsController@update');
    Route::delete('piezimes/{id}', 'App\Http\Controllers\PostsController@destroy');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('objekti', 'App\Http\Controllers\ObjectsController@index')->name('objects');
    Route::get('objekti/jauns', 'App\Http\Controllers\ObjectsController@create')->middleware('isAdmin');
    Route::post('objekti', 'App\Http\Controllers\ObjectsController@store')->middleware('isAdmin');
    Route::get('objekti/{id}', 'App\Http\Controllers\ObjectsController@show');
    Route::get('objekti/{id}/rediget', 'App\Http\Controllers\ObjectsController@edit')->middleware('isAdmin');
    Route::put('objekti/{id}', 'App\Http\Controllers\ObjectsController@update')->middleware('isAdmin');
    Route::delete('objekti/{id}', 'App\Http\Controllers\ObjectsController@destroy')->middleware('isAdmin');
});

Route::group(['middleware'=>['auth']], function(){
    Route::get('pazinojumi', 'App\Http\Controllers\NotifsController@index')->name('notifications');
    Route::get('pazinojumi/jauns', 'App\Http\Controllers\NotifsController@create')->middleware('isAdmin');
    Route::post('pazinojumi', 'App\Http\Controllers\NotifsController@store')->middleware('isAdmin');
    Route::get('pazinojumi/{id}', 'App\Http\Controllers\NotifsController@show');
    Route::get('pazinojumi/{id}/rediget', 'App\Http\Controllers\NotifsController@edit')->middleware('isAdmin');
    Route::put('pazinojumi/{id}', 'App\Http\Controllers\NotifsController@update')->middleware('isAdmin');
    Route::delete('pazinojumi/{id}', 'App\Http\Controllers\NotifsController@destroy')->middleware('isAdmin');
});

Route::group(['middleware'=>['isAdmin']], function(){
    Route::get('darbs', 'App\Http\Controllers\WorkRecordsController@index')->name('work');
    Route::get('darbs/jauns', 'App\Http\Controllers\WorkRecordsController@create');
    Route::post('darbs', 'App\Http\Controllers\WorkRecordsController@store');
    Route::get('darbs/{id}', 'App\Http\Controllers\WorkRecordsController@show');
    Route::get('darbs/{id}/rediget', 'App\Http\Controllers\WorkRecordsController@edit');
    Route::put('darbs/{id}', 'App\Http\Controllers\WorkRecordsController@update');
    Route::delete('darbs/{id}', 'App\Http\Controllers\WorkRecordsController@destroy');
});