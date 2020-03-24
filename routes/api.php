<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//微信相关路路由

// 'namespace' => 'Wechat' 是在 "App\Http\Controllers\Wechat" 命名空间下的控制器,'prefix' 前缀
Route::group(['namespace' => 'Wechat', 'prefix' => 'wechat'], function () {
    Route::any('/serve', 'WechatController@serve');
    Route::get('/menu', 'MenuController@create');
});
//问卷
Route::get('/wechat/pe_questionnaire',function () {
    return view('wechat.pe_questionnaire');
});

Route::get('/wechat/single','Wechat\QuesController@single');
Route::get('/wechat/multiple','Wechat\QuesController@multiple');

//套餐
Route::get('/wechat/pe_package','Wechat\PackageController@index');
Route::get('/wechat/pe_item','Wechat\ItemController@index');

//个人中心
Route::get('/wechat/order',function () {
    return view('wechat.order');
});