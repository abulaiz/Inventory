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

Route::get('/category', 'ItemController@category_list');
Route::post('/category/add', 'ItemController@add_category');
Route::post('/category/delete', 'ItemController@delete_category');

Route::get('/item/{id}', 'ItemController@item_list');
Route::post('/item/add', 'ItemController@add_item');
Route::post('/item/update', 'ItemController@update_item_description');
Route::post('/item/delete', 'ItemController@delete_item');

Route::post('/item/move', 'MovementController@move');