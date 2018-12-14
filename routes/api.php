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

Route::get('register', 'API\UserController@register');
Route::post('login', 'UserController@login');
Route::get('details', 'UserController@details');

// /middleware' => ['auth:api'],
Route::group(['prefix' => 'v1'], function()
{

    Route::resources([
        'church'   => 'ChurchController',
        'branch' => 'BranchController',
    ]);


});




Route::resource('settings', 'SettingAPIController');

Route::resource('member_types', 'MemberTypeAPIController');

Route::resource('member_details', 'MemberDetailAPIController');
