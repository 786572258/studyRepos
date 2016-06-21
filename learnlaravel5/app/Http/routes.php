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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('now', function () {  
    return date("Y-m-d H:i:s");
});
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    //Route::get('article', 'ArticleController@index');
    Route::resource('article', 'ArticleController');
});

Route::get('article/{id}', 'ArticleController@show');
Route::post('comment', 'CommentController@store');


//可选的路由参数
//有时候你可能需要指定路由参数，但是让路由参数的存在是可选的。这时可以在参数名称后面加上 ? 来实现：
Route::get('user/{name?}', function ($name = 'wei') {
    return $name;
});

//正则表达式限制参数#
//你可以在路由实例上使用 where 方法来限制路由参数格式。where 方法接受参数的名称和定义参数应该如何被限制的正则表达式：
Route::get('user2/{id}', function ($id) {
    return "是数字进入";
})->where('id', '[0-9]+');


Route::auth();

Route::get('/', 'HomeController@index');

