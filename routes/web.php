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

Route::post('admin/goods/xiugai','Admin\GoodsController@xiugai');


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

	// 后台商品添加
	Route::resource('admin/goods','Admin\GoodsController');

	// 后台执行修改商品


	// 后台 分类 路由
	Route::resource('admin/link','Admin\LinkController');

	// 后台 订单 路由
	Route::resource('admin/order','Admin\OrderController');

	//后台发货 
	Route::get('admin/fahuo/{id}','Admin\OrderController@fahuo');

	// 订单编辑
	Route::get('admin/doindents/{id}','Admin\OrderController@show');

	// 查看订单详情
	Route::get('admin/store/{id}','Admin\OrderController@store');

	// 订单修改
	Route::post('admin/create','Admin\OrderController@create');

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
Route::post('/login/dologin','Home\LoginController@dologin');

// 前台 商品详情 路由
Route::get('/detail/{id}','Home\DetailController@index');

// 前台 购物车 路由
Route::resource('/cart','Home\CartController');
Route::get('/home/addproduct','Home\CartController@addproduct');
Route::post('/cart/delete','Home\CartController@delete');
Route::get('/addcart','Home\CartController@addcart');
Route::post('/order/postcon','Home\CartController@postcon');
Route::get('/order/confirm','Home\CartController@confirm');
Route::get('/order/getPay','Home\CartController@getPay');
Route::get('/order/success','Home\CartController@success');

// 前台 用户gerenzhongxin 路由
Route::get('/user/index','Home\UserController@index');
Route::get('/user/order','Home\UserController@order');
Route::get('/user/address','Home\UserController@address');
Route::get('/user/comment','Home\UserController@comment');


// 商品列表
// Route::get('/home/list/{id}','Home\ListController@index');

// 商品搜索
Route::get('/home/list_search','Home\ListController@eidt');

// 前台 登录 路由
Route::get('/login','Home\LoginController@login');
Route::post('/login/dologin','Home\LoginController@dologin');

// 前台 注册  路由
Route::resource('/register','Home\RegisterController');
Route::resource('/register/show','Home\RegisterController@show');
Route::post('/register/create','Home\RegisterController@create');

// 前台 商品
Route::resource('/list','Home\ListController');

// 执行修改个人信息
Route::post('/user/store','Home\UserController@store');

// 执行添加收货地址
Route::get('/user/add','Home\UserController@add');

// 执行删除收货地址
Route::get('/user/del','Home\UserController@del');

// 执行设置默认收货地址
Route::get('/user/update','Home\UserController@update');

// 注销账号
Route::get('/user/logout','Home\UserController@logout');

//修改密码页面
Route::get('/user/password','Home\UserController@password');

//执行修改密码页面
Route::post('/user/newpass','Home\UserController@newpass');


















































































































// 评论页面
Route::get('/comment/comments/{id}','Home\UserController@comments');

// 执行添加评论
Route::post('/comment/insert','Home\UserController@insert');

// 我的关注页面
Route::get('/user/attention','Home\UserController@attention');

// 执行添加商品关注
Route::get('/user/attentions/{id}','Home\UserController@attentions');

// 删除关注商品
Route::get('/user/delatten/{id}','Home\UserController@delatten');
