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

Route::group(['middleware' => ['auth:api']], function () {
    Route::apiResource('users', 'API\UserController', ['except' => ['create', 'edit', 'show']]);
    Route::apiResource('roles', 'API\RoleController', ['except' => ['create', 'edit', 'show']]);
    Route::apiResource('permissions', 'API\PermissionController', ['except' => ['create', 'edit', 'show']]);
    Route::apiResource('configs', 'API\ConfigurationController', ['except' => ['create', 'edit', 'show']]);
    Route::apiResource('settings', 'API\SettingController', ['only' => ['index', 'update']]);
    Route::get('search/users', 'API\UserController@search');
    Route::post('toggle/role', 'API\UserController@toggleRole');
    Route::post('toggle/permission', 'API\UserController@togglePerm');
    Route::post('toggle/config/role', 'API\ConfigurationController@toggleRole');
    Route::get('search/roles', 'API\ConfigurationController@search');
    Route::get('search/permissions', 'API\PermissionController@search');
    Route::get('search/configs', 'API\ConfigurationController@search');
    Route::get('search/settings', 'API\SettingController@search');
    Route::get('test', function () {
        return 55;
    });
});
