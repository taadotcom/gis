<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


// Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/show/{post}', [App\Http\Controllers\HomeController::class, 'show'])->middleware('auth');;
Route::get('/crimescase', [App\Http\Controllers\HomeController::class, 'getCaseByType']);
Route::resource('files', FileController::class);
Route::post('files/del', [FileController::class, 'delete'])->middleware('auth');
Route::get('files/download/{post}', [App\Http\Controllers\FileController::class, 'download'])->middleware('auth');
