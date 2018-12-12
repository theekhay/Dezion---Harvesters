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
Route::post('login', 'API\UserController@login');
Route::get('details', 'API\UserController@details');

Route::group(['middleware' => ['auth:api'], 'prefix' => 'v1/member'], function()
{

    Route::resources([
        'church'   => 'ChurchController',
        'branch' => 'BranchController',
    ]);


});




Route::resource('settings', 'SettingAPIController');

Route::resource('member_types', 'MemberTypeAPIController');