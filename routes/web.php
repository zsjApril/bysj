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
// 浏览器访问bysj.cn/时重定向路由到bysj.cn/login 进入登录页面


//登录
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', 'Web\LoginController@login');
Route::post('/login', 'Web\LoginController@dologin');

//登出
Route::get('/logout', 'Web\LoginController@logout');

//后台路由组加中间件,没有登陆限制进入后台页面
Route::group(['middleware'=>'login'],function (){

    //进入后台
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    });

    //管理员相关路由
    Route::get('/user/add','Web\UserController@add');

    Route::post('/user/insert','Web\UserController@insert');

    Route::get('/user/index','Web\UserController@index');

    Route::get('/user/delete/{id}','Web\UserController@delete');

    Route::any('/user/import','Web\UserController@import');

    //套餐相关路由
    Route::get('/pe_package/index','Web\PackageController@index');

    Route::get('/pe_package/delete/{id}','Web\PackageController@delete');

    Route::get('/pe_package/edit/{id}','Web\PackageController@edit');

    Route::post('/pe_package/update','Web\PackageController@update');

    Route::get('/pe_package/add','Web\PackageController@add');

    Route::post('/pe_package/insert','Web\PackageController@insert');

    Route::any('/pe_package/import','Web\PackageController@import');

    //项目相关路由
    Route::get('/pe_items/index','Web\ItemController@index');

    Route::get('/pe_items/delete/{id}','Web\ItemController@delete');

    Route::get('/pe_items/edit/{id}','Web\ItemController@edit');

    Route::post('/pe_items/update','Web\ItemController@update');

    Route::get('/pe_items/add','Web\ItemController@add');

    Route::post('/pe_items/insert','Web\ItemController@insert');

    Route::any('/pe_items/import','Web\ItemController@import');


    //题目相关路由
    Route::get('/pe_questionnaire/single_index','Web\QuesController@single_index');
    Route::get('/pe_questionnaire/multiple_index','Web\QuesController@multiple_index');

});





