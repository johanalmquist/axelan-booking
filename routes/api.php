<?php

use Illuminate\Http\Request;

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

Route::get('/admin/count/books/total', 'Admin\AdminApiController@totalBooks');
Route::get('/admin/count/books/total/verf', 'Admin\AdminApiController@totalBooksVerf');
Route::get('/admin/count/books/total/verf/no', 'Admin\AdminApiController@totalBooksNoVerf');
Route::get('/admin/count/users/total', 'Admin\AdminApiController@totalUsers');
Route::get('/admin/get/books', 'Admin\AdminApiController@getBooks');
Route::get('/admin/get/users', 'Admin\AdminApiController@getUsers');
