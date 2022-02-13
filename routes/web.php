<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/auth/login');
    // return view('welcome');
});

Route::get('/login', function () {
    return redirect('/auth/login');
});

Route::group(['middleware' => 'guest', 'name' => 'cauth.'], function() {
    Route::get('/auth/login', App\Http\Livewire\Auth\Login::class);
});

Route::group(['middleware' => 'auth', 'name' => 'dashboard.'], function() {
    Route::get('/dashboard', App\Http\Livewire\Dashboard\Index::class);
    Route::group(
        [
            // 'middleware' => 'admin',
            // 'namespace' => 'Diskusi',
            'prefix' => 'users',
            'name' => 'users.'
        ],
        function() {
            Route::get('/', App\Http\Livewire\User\Index::class);
            Route::get('/create', App\Http\Livewire\User\Create::class);
        }
    );
});

Auth::routes();
