<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');  //指定首页

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');



// 引导用户到新浪微博的登录授权页面
Route::get('auth/weibo', 'Auth\AuthController@weibo');
// 用户授权后新浪微博回调的页面
Route::get('auth/callback', 'Auth\AuthController@callback');


Route::get('user/{id}','ArticleController@index');
Route::get('article/{id}','ArticleController@showArticle')->where('id', '[0-9]+');

Route::group(['middleware'=>'Permission'], function () {

Route::get('home','ArticleController@showController');
Route::get('article/create','ArticleController@create');
Route::post('article/create','ArticleController@store');
Route::get('article/{id}/edit','ArticleController@edit');
Route::DELETE('article/delete/{id}','ArticleController@destroy');
Route::post('/post_case/{id}','UserController@post_case');
});
