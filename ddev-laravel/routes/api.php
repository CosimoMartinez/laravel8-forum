<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CommmentController;
use App\Http\Controllers\Api\TopicController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->group( function () {

    Route::apiResource('topics', TopicController::class);
    Route::apiResource('comments', CommentController::class);

});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
