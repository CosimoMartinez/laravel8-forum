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


Route::get('/', [App\Http\Controllers\TopicController::class, 'index']);

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\TopicController::class, 'index'])->name('home');

Route::resource('comments', App\Http\Controllers\CommentController::class);

Route::resource('topics', App\Http\Controllers\TopicController::class);