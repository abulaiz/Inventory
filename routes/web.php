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

Auth::routes(['register' => false, 'reset' => false]);

View::composer("*","App\Composers\BaseComposer");

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:manager']], function () {
	Route::post('/category/add', 'ItemController@add_category');
	Route::post('/category/delete', 'ItemController@delete_category');
	Route::post('/submission/reject', 'SubmissionController@reject');
	Route::post('/submission/confirm', 'SubmissionController@confirm');	
});

Route::group(['middleware' => ['role:manager|admin']], function () {
	Route::post('/item/add', 'ItemController@add_item');
	Route::post('/item/update', 'ItemController@update_item_description');
	Route::post('/item/delete', 'ItemController@delete_item');
});

Route::group(['middleware' => ['role:cleaner|admin']], function () {
	Route::get('/submission/create', 'SubmissionController@create');
	Route::post('/submission/store', 'SubmissionController@store');
});

Route::get('/category', 'ItemController@category_list');
Route::get('/item/{id}', 'ItemController@item_list');
Route::post('/item/move', 'MovementController@move');
Route::get('/history/{id}', 'MovementController@history');

Route::post('/missing/add', 'MissingItemController@add');
Route::post('/missing/cancel', 'MissingItemController@cancel');
Route::get('/missing_item', 'MissingItemController@report');

Route::get('/submission', 'SubmissionController@index');
Route::post('/submission/delete', 'SubmissionController@delete');

Route::get('/unit', 'UnitController@index');
Route::get('/unit/item/{id}', 'UnitController@items');
