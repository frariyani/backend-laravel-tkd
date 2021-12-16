<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('article/create', 'Api\ArticleController@store');
Route::get('article/display', 'Api\ArticleController@display');
Route::get('article/delete/{id}', 'Api\ArticleController@destroy');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
