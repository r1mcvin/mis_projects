<?php

use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\AccountController;
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
    return view('login');
})->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::post('login', [AccountController::class, 'login'])->name('login.post');
});

