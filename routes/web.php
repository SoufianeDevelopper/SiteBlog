<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index');

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('listCategory','CategoryController@index')->name('listCategory');

Route::get('addCategory','CategoryController@create')->name('addCategory');
Route::post('storCategory','CategoryController@store')->name('storeCategory');

Route::get('editCategory/{id}','CategoryController@edit')->name('editCategory');
Route::post('updateCategory','CategoryController@update')->name('updateCategory');

Route::get('deleteCategory/{id}','CategoryController@destroy')->name('deleteCategory');


//filter post publisher connected
Route::get('list/post/user','PostController@index')->name('listpost');
Route::get('list/post/user/published','PostController@filter_published')->name('listpostpublished');
Route::get('list/post/user/unpublished','PostController@filter_unpublished')->name('listpostunpublished');
Route::get('list/post/user/New','PostController@filter_publisher_Now')->name('publisher_listpostnow');
Route::get('list/post/user/Old','PostController@filter_publisher_Old')->name('publisher_listpostold');
//filter list post for all users and administrateur
Route::get('list/post/all/New','PostController@filter_Now')->name('listpostnow');
Route::get('list/post/all/Old','PostController@filter_Old')->name('listpostold');
//list post for administrateur 
Route::get('list/post/administrateur','PostController@list_post_administrateur')->name('listpostadministrateur');
Route::get('ajouterPost','PostController@create')->name('ajouterpost');
Route::post('ajouter_Post','PostController@store')->name('storedpost');
Route::get('editPost/{id}','PostController@edit')->name('editpost');
Route::post('updatepost','PostController@update')->name('updatepost');
Route::get('deletepost/{id}','PostController@destroy')->name('deletepost');