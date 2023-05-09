<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\NotifsController;
use App\Http\Controllers\WorkRecords\AdminWorkRecordsController;
use App\Http\Controllers\WorkRecords\ForemanWorkRecordsController;
use App\Http\Controllers\WorkShow\AdminWorkShowController;
use App\Http\Controllers\WorkShow\UserWorkShowController;
use App\Http\Controllers\WorkShowController;
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

Route::prefix('vaditajs')->middleware('isAdmin')->group(function() {
    Route::get('atskaites', [AdminWorkRecordsController::class, 'index'])->name('isAdmin.work');
    Route::get('darbs', [AdminWorkShowController::class, 'index'])->name('isAdmin.workshow');
});

Route::prefix('brigadieris')->middleware('isForeman')->group(function() {
    Route::get('atskaites', [ForemanWorkRecordsController::class, 'index'])->name('isForeman.work');
});

Route::middleware('isForemanOrUser')->group(function() {
    Route::get('darbs', [UserWorkShowController::class, 'index'])->name('isForemanOrUser.workshow');
});

Route::middleware(['isAdmin'])->group(function() {
    Route::post('registracija', [RegisterController::class, 'register'])->name('register');
    Route::get('registracija', [RegisterController::class, 'showRegistrationForm']);
    Route::get('lietotaji', [AllUsersController::class, 'index'])->name('allusers');
});

// Route::group(['middleware'=>['auth']], function(){
//     Route::get('profils', [ProfileController::class, 'profile'])->name('profile');
//     Route::get('iziet', [LogoutController::class, 'perform'])->name('logout');
// });

Route::group(['middleware'=>['auth']], function(){
    Route::get('profils', [ProfileController::class, 'profile'])->name('profile');
    Route::get('iziet', [LogoutController::class, 'perform'])->name('logout');
    Route::get('profila_iestatijumi', [ProfileController::class, 'edit_profile'])->name('edit_profile');
    Route::post('profila_iestatijumi', [ProfileController::class, 'update_profile'])->name('update_profile');
});

// PIEZĪMES

Route::group(['middleware'=>['auth']], function(){
    Route::get('piezimes', [PostsController::class, 'index'])->name('posts');
    Route::get('piezimes/jauns', [PostsController::class, 'create']);
    Route::post('piezimes', [PostsController::class, 'store']);
    Route::get('piezimes/{id}', [PostsController::class, 'show']);
    Route::get('piezimes/{id}/rediget', [PostsController::class, 'edit']);
    Route::put('piezimes/{id}', [PostsController::class, 'update']);
    Route::delete('piezimes/{id}', [PostsController::class, 'destroy']);
});

// OBJEKTI

Route::group(['middleware'=>['auth']], function(){
    Route::get('objekti', [ObjectsController::class, 'index'])->name('objects');
    Route::get('objekti/jauns', [ObjectsController::class, 'create']);
    Route::post('objekti', [ObjectsController::class, 'store']);
    Route::get('objekti/{id}', [ObjectsController::class, 'show']);
    Route::get('objekti/{id}/rediget', [ObjectsController::class, 'edit']);
    Route::put('objekti/{id}', [ObjectsController::class, 'update']);
    Route::delete('objekti/{id}', [ObjectsController::class, 'destroy']);
});

// PAZIŅOJUMI

Route::group(['middleware'=>['auth']], function(){
    Route::get('pazinojumi', [NotifsController::class, 'index'])->name('notifications');
    Route::get('pazinojumi/jauns', [NotifsController::class, 'create']);
    Route::post('pazinojumi', [NotifsController::class, 'store']);
    Route::get('pazinojumi/{id}', [NotifsController::class, 'show']);
    Route::get('pazinojumi/{id}/rediget', [NotifsController::class, 'edit']);
    Route::put('pazinojumi/{id}', [NotifsController::class, 'update']);
    Route::delete('pazinojumi/{id}', [NotifsController::class, 'destroy']);
});