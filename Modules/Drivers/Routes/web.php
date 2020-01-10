<?php

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



Route::group(['prefix' => 'drivers','middleware' => ['locator']],function () {
    Route::get('form/{country?}', 'DriversController@index')->name('drivers.index');
    Route::post('/', 'DriversController@store')->name('drivers.store');
    Route::get('/go/test','DriversController@test');


});
Route::get('/', function (){
    abort(403);
})->name('drivers.zero');
Route::group(['prefix' => 'drivers','middleware' => ['auth']],function () {
    Route::get('sheet/{active?}','DriversController@sheet')->name('drivers.sheet');

});
