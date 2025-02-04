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
Route::delete('/mypage', 'PagesController@deleteMypage'); //投稿内容の削除
Route::put('/mypage', 'PagesController@putMypage'); //投稿内容の削除

//searchを表示
Route::post('/search', 'PagesController@postSearch');
Route::get('/search/{id}', 'PagesController@getSearch');

//postscreenを表示
Route::get('/postscreen', 'PagesController@getPostscreen');
Route::post('/postscreen', 'PagesController@postPostscreen');
Route::patch('/postscreen', 'PagesController@patchPostscreen'); //いいね機能

//mailを表示
Route::get('/mail', 'PagesController@getMail');

//新規投稿画面を表示
Route::get('/newpost', 'PagesController@getNewpost');
Route::post('/newpost', 'PagesController@postNewpost');

//投稿画面の編集ページ
//Route::get('/postediting', 'PagesController@getPostediting');
Route::post('/postscreen/{id}/edit', 'PagesController@postPostediting');

//ユーザー投稿詳細ページを表示
Route::get('/postscreen/{id}', 'PagesController@getDetailspage');

//mailを表示
Route::get('/privacy', 'PagesController@getPrivacy');