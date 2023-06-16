<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('blogs', [App\Http\Controllers\BlogController::class, 'allBlogs']);
Route::get('/blog/{id}', [App\Http\Controllers\BlogController::class, 'getSingleBlog']);
Route::post('contact/store', [App\Http\Controllers\ContactController::class, 'store']);
Route::post('career/store', [App\Http\Controllers\ContactController::class, 'careerstore']);


  