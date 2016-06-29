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

Route::get('/', 'ArticleController@index');

//测试
Route::get('test1/{name}', function($name) {
    echo $name;
    $hi = "你好";
    $object = "世界";
    //return View::make("test1.index")->with("hi", $hi)->with("object", $object);
    //return View::make("test1.index")->with(array("hi"=>$hi, "object"=>$object));
    // return View::make("test1.index", array("hi"=>$hi, "object"=>$object));

   /* $view = View::make("test1.index");
    $view->hi = "你好";
    $view->object = "世界";
    return $view;*/
});

//"?"是可选的意思，没有参数就用110
Route::get('test2/{num?}', array('as'=>'test2_route',function($num = 110) {
    echo $num;
}))->where('num', '\d+');

Route::get('test3',function() {
   return Redirect::route('test2_route');
});

Route::get('test4',function() {
    $data = [1,3,4,5,"你好设计"];
    $count = 33;
    return View::make("test1.test4")->with('data', $data)->with('count', $count);
});

Route::get('test5',function() {
    return View::make("test1.test5");
});

//表单测试
Route::get('test6',function() {
    return View::make("test1.test6");
});

Route::post('test7',function() {
    debug($_POST);
    //return View::make("test1.test7");
});

Route::get('test8',function() {
    //$d = DB::select("select * from article");
    //dd($d);

    //$r = DB::insert("insert into article set cate_id = ?, user_id = ?, title=?", [1,1,'测试2', 234]);
    //$r = DB::insert("delete from article where id = ?", [118]);
    //echo $r;
    //dd($r);

    //$d = DB::table('article')->get();
    //dd($d);

    /*
    $r = DB::table('article')->insertGetId([
        'cate_id' => 1,
        'user_id' => 1,
        'title' => '测试哦'.rand(1,3333456546),
    ]);
    dd($r);
    */

    /*$r = DB::table('article')->where('id', "=", 354345)->orWhere('id', "=", 2)->first();
    dd($r);*/

    //whereBetween whereNotIn whereNull
    $r = DB::table('article')->whereBetween("id", [4, 119])->take(3)->get();
    dd($r);

    //return View::make("test1.test7");
});


Route::resource('article', 'ArticleController');
Route::resource('comment', 'CommentController');
Route::resource('category', 'CategoryController');
Route::resource('about', 'AboutController');


Route::controllers([
    'backend/auth' => 'backend\AuthController',
    'backend/password' => 'backend\PasswordController',
    'search'=>'SearchController',
]);

Route::group(['prefix'=>'backend','middleware'=>'auth'],function(){
    Route::any('/','backend\HomeController@index');
    Route::resource('home', 'backend\HomeController');
    Route::resource('cate','backend\CateController');
    Route::resource('content','backend\ContentController');
    Route::resource('article','backend\ArticleController');
    Route::resource('tags','backend\TagsController');
    Route::resource('user','backend\UserController');
    Route::resource('comment','backend\CommentController');
    Route::resource('nav','backend\NavigationController');
    Route::resource('links','backend\LinksController');
    Route::controllers([
        'system'=>'backend\SystemController',
        'upload'=>'backend\UploadFileController'
    ]);

});