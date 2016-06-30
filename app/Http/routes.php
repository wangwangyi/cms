<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::group(['middleware' => 'auth','namespace' => 'System','prefix' => 'admin'],function(){
        Route::get('/cms/system', 'IndexController@index');//首页
        Route::delete('/category/delete', 'CategoryController@delete');//删除栏目
        Route::resource('category', 'CategoryController');//分类
        Route::delete('/article/delete', 'ArticleController@delete');//删除内容
        Route::delete('/article/destroy_checked', 'ArticleController@checked_del');//多选删除内容
        Route::resource('article', 'ArticleController');//内容
        Route::get('/system/config','ConfigController@index');//获取站点信息页面
        Route::put('/setting/config','ConfigController@update');//修改站点信息
        Route::get('/system/change','ConfigController@change');//获取修改密码页面
        Route::patch('/setting/do_change','ConfigController@update_password');//修改密码
        Route::get('/cache', 'CacheController@clear_cache');//清除缓存
        Route::delete('/picture/delete', 'PictureController@delete');//删除焦点图
        Route::resource('picture','PictureController');//焦点图
    });
    Route::post('/upload', 'FileController@upload');//上传缩略图
    Route::post('/upload_icon', 'FileController@upload_icon');//上传ico网站图标


});
