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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PagesController@getIndex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//mypageを表示
Route::get('/mypage', 'PagesController@getMypage');
Route::post('/mypage', 'PagesController@postMypage');

//searchを表示
Route::post('/search', 'PagesController@postSearch');
Route::get('/search/{id}', 'PagesController@getSearch');

//postscreenを表示
Route::get('/postscreen', 'PagesController@getPostscreen');

//mailを表示
Route::get('/mail', 'PagesController@getPostscreen');

//新規投稿画面を表示
Route::get('/newpost', 'PagesController@getPostscreen');