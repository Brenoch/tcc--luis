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
    return view('exemplo');
});

Route::controller(\App\Http\Controllers\User::class)->group(function () {
    Route::POST('/login_ajax', 'login_ajax');
    Route::POST('/cadastro_ajax', 'cadastro_ajax');
});
