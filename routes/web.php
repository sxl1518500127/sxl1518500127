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

Route::post('admin/goods/xiugai','Admin\GoodsController@xiugai');
// 后台 首页 的路由
Route::get('admin','Admin\IndexController@index');

// 后台 用户 路由
Route::resource('admin/users','Admin\UsersController');

// 后台 分类 路由
Route::resource('admin/cates','Admin\CatesController');

// 后台商品添加
Route::resource('admin/goods','Admin\GoodsController');

// 后台执行修改商品


// 后台 分类 路由
Route::resource('admin/link','Admin\LinkController');

// 后台 订单 路由
Route::resource('admin/order','Admin\OrderController');

// 后台 网站 路由
Route::resource('admin/config','Admin\ConfigController');


