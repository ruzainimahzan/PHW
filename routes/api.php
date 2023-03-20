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

Route::get('getCategoryRoaster', 'RoasterController@getCategoryRoaster');
Route::get('getPatient', 'RoasterController@getPatient');
Route::get('getStaff', 'RoasterController@getStaff');
Route::get('getRoasterList', 'RoasterController@getRoasterList');
Route::get('getRoasterListPatient','RoasterController@getRoasterListPatient');
Route::post('/submit', 'RoasterController@submit');
Route::post('/submitroaster','RoasterController@submitroaster');
Route::get('removeroaster','RoasterController@removeroaster');
Route::get('checkroaster','RoasterController@checkroaster');

