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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware'=>['auth']],function(){
// 表示用
Route::get('/top','PostsController@index');
// 投稿押したとき
Route::post('/top','PostsController@postCreate');

// 編集更新
Route::post('/update','PostsController@update');
// 投稿削除
Route::get('/post/{id}/delete','PostsController@delete');

// プロフィール編集画面表示
Route::get('/profile/{id}','UsersController@profile');
// プロフィール編集
Route::post('/profile/update','UsersController@profileUpdate');

Route::get('/users/{id}/profile','UsersController@follower_profile');

Route::get('/search','UsersController@search');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

// フォロー機能
Route::get('/follow/{id}','FollowsController@store');
// フォロー解除
Route::get('/unfollow/{id}','FollowsController@unfollow');

// ログアウト
Route::get('/logout','Auth\LoginController@logout');
Route::post('/logout','Auth\LoginController@logout');

});
