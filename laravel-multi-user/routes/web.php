<?php

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
    return view('welcome');
});

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => 'App\Http\\Controllers',
], function(){
    Route::get('login', 'LoginAdminController@formlogin')->name('admin.login');
    Route::post('login', 'LoginAdminController@login');
    Route::middleware(['auth:admin'])->group (function(){
        Route::post('logout', 'LoginAdminController@logout')->name('admin.logout');
        Route::view('/', 'dashboard')->name('dashboard');
        Route::view('/post', 'data-post')->name('post')->middleware('can:role, "admin", "pasien"');
        Route::view('/admin', 'data-admin')->name('admin')->middleware('can:role, "admin"');
    });
});