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

// Route::get('/', function () {
//     return view('welcome');
// });

// 后台 登录 路由
Route::get('admin/login','Admin\LoginController@login');
// // 后台 执行登录  路由
Route::post('admin/login/dologin','Admin\LoginController@dologin');

// // 权限页面
// Route::get('admin/allow',function(){ ·········
// 	return view('admin.allow.allow');
// });






// 权限验证的中间件  【allow】
// Route::group(['middleware'=>['login','allow']],function(){
Route::group(['middleware'=>['login']],function(){


// 后台 首页 的路由
Route::get('admin','Admin\IndexController@index');

// 后台 用户 路由
Route::resource('admin/users','Admin\UsersController');

// 后台 分类 路由
Route::resource('admin/cates','Admin\CatesController');

// 后台 分类 路由
Route::resource('admin/link','Admin\LinkController');

// 后台 订单 路由
Route::resource('admin/order','Admin\OrderController');

// 后台 网站 路由
Route::resource('admin/config','Admin\ConfigController');

// 后台 管理员 路由
Route::resource('admin/admins','Admin\AdminController');

// 后台 管理员权限修改 路由
Route::post('admin/xgrole/{id}','Admin\AdminController@xgrole');

// 后台 权限 管理、
Route::resource('admin/nodes','Admin\NodesController');

// 后台 角色 管理、
Route::resource('admin/roles','Admin\RolesController');
});

// 前台 首页 路由
Route::get('/','Home\IndexController@index');

// 前台 登录 路由
Route::get('/login','Home\LoginController@login');

// 前台 注册  路由
Route::get('home/login/register','Home\LoginController@register');

// 前台 商品详情 路由
Route::resource('/detail','Home\DetailController');

// 前台 购物车 路由
Route::resource('/cart','Home\CartController');



// 前台 用户 路由
Route::get('/user/index','Home\UserController@index');
Route::get('/user/order','Home\UserController@order');
Route::get('/user/address','Home\UserController@address');
Route::get('/user/comment','Home\UserController@comment');