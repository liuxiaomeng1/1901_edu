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

Route::prefix('/admin')->group(function(){
   route::any('index','admin\AdminController@index');
});

//课程模板
Route::prefix('/class')->group(function(){
    route::any('class_cate_add','class1\ClassController@class_cate_add');//添加课程分类
    route::any('class_cate_add_do','class1\ClassController@class_cate_add_do');//添加课程分类执行
    route::any('class_list','class1\ClassController@class_list');//课程展示
    route::any('class_del/{class_id}','class1\ClassController@class_del');//课程展示
    route::any('class_edit/{class_id}','class1\ClassController@class_edit');//课程xiugai
    route::any('class_edit_do','class1\ClassController@class_edit_do');//课程xiugai
    route::any('class_eva/{class_id}','class1\ClassController@class_eva');//课程评论
    route::any('class_eva_eva/{e_id}','class1\ClassController@class_eva_eva');//查看评论
    route::any('class_eva_del/{e_id}','class1\ClassController@class_eva_del');//查看评论
    route::any('class_eva_add/{class_id}','class1\ClassController@class_eva_add');//评论课程
    route::any('class_eva_add_do','class1\ClassController@class_eva_add_do');//评论课程执行
    route::any('eva_add_do','class1\ClassController@eva_add_do');//追加评论执行
    route::any('eva_add/{e_id}','class1\ClassController@eva_add');//追加评论

    route::any('class_cate_list','class1\ClassController@class_cate_list');//添加课程分类执行
    route::any('class_add','class1\ClassController@class_add');//添加课程
    route::any('class_add_do','class1\ClassController@class_add_do');//添加课程执行





    //笔记
    route::any('create','class1\NoteController@create');
    route::any('store','class1\NoteController@store');
    route::any('note_index','class1\NoteController@index');


});

//后台注册登录
Route::prefix('/landing')->group(function(){

    //登录
    route::any('create','landing\LoginController@create');  //登录
    route::any('create_do','landing\LoginController@create_do');//登录执行
    route::any('loginout','landing\LoginController@loginout'); //登录退出


    //管理员
    route::any('admin','landing\LoginController@admin'); //管理员添加

    route::any('admin_do','landing\LoginController@admin_do'); //管理员添加执行

    route::any('admin_list','landing\LoginController@admin_list'); //管理员列表

    route::any('admin_del','landing\LoginController@admin_del');  //管理员删除

    route::any('admin_edit','landing\LoginController@admin_edit');  //管理员修改

    route::any('admin_update','landing\LoginController@admin_update');  //管理员修改执行
});

/**
 * 登录
 */
Route::get('/login', 'admin\admin@login');
Route::any('/login_denglu', 'admin\admin@login_denglu');
route::any('/login_loginout','admin\admin@login_loginout'); //登录退出
/**
 * 操作
 */

Route::group(['middleware' => ['Login']], function () {
    Route::get('/loy', 'admin\admin@loy');
    Route::get('admin', 'Admin\admin@admin');

    Route::group(['middleware' => ['Quanxian']], function () {
        Route::get('admin_insert', 'admin\admin@admin_insert');
        Route::post('admin_submit', 'admin\admin@admin_submit');
        Route::get('admin_set/{admin_id}', 'admin\admin@admin_set');
        Route::post('admin_role_insert', 'admin\admin@admin_role_insert');
        Route::get('admin_delete/{admin_id}', 'admin\admin@admin_delete');

        Route::get('role_delete/{role_id}', 'admin\admin@role_delete');

        Route::get('role_select', 'admin\admin@role_select');
        Route::get('right', 'admin\admin@right');


    });


    /**
     *角色添加
     */
    Route::get('role', 'admin\admin@role');
    Route::post('role_insert', 'admin\admin@role_insert');

    Route::post('role_right', 'admin\admin@role_right');

});

//咨询模块
Route::prefix('/consulting')->group(function(){
    route::any('add','admin\ConsultingController@add');
    route::any('add_do','admin\ConsultingController@add_do');
    route::any('index','admin\ConsultingController@index');
    route::any('del','admin\ConsultingController@del');
    route::any('edit','admin\ConsultingController@edit');
    route::any('update','admin\ConsultingController@update');
});

//收藏夹表管理
Route::prefix('/collection')->group(function(){
    route::any('coll_index','admin\CollectionController@coll_index');
    route::any('index','admin\CollectionController@index');
});

//轮播图管理
Route::prefix('/slide')->group(function(){
    route::any('add','admin\SlideController@add');
    route::any('add_do','admin\SlideController@add_do');
    route::any('index','admin\SlideController@index');
});

//作业管理
Route::prefix('/home')->group(function(){
    route::any('add','admin\HomeController@add');
    route::any('add_do','admin\HomeController@add_do');
    route::any('index','admin\HomeController@index');
});

//问题模块
Route::prefix('/questions')->group(function(){
    Route::any('questions','admin\QuestionController@questions');//问题添加页面
    Route::any('questions_do','admin\QuestionController@questions_do');//问题添加页面
    Route::any('questions_list','admin\QuestionController@questions_list');//问题列表页面
    Route::any('del','admin\QuestionController@del');//问题删除页面
    Route::any('edit','admin\QuestionController@edit');//问题修改页面
    Route::any('update','admin\QuestionController@update');//问题修改执行页面
    Route::any('response','admin\QuestionController@response');//问题回答页面
    Route::any('response_do','admin\QuestionController@response_do');//执行问题回答
    Route::any('response_list','admin\QuestionController@response_list');//问题回答列表
    Route::any('response_del','admin\QuestionController@response_del');//问题回答删除
});

//课程目录模块
Route::prefix('/lect')->group(function(){
    Route::any('directory_add','admin\DirectoryController@directory_add');//课程目录添加
    Route::any('directory_do','admin\DirectoryController@directory_do');//课程目录添加执行
    Route::any('directory_list','admin\DirectoryController@directory_list');//课程目录列表
    Route::any('directory_del','admin\DirectoryController@directory_del');//课程目录删除
    Route::any('audit','admin\DirectoryController@audit');//课程目录修改审核状态
});
//题库
Route::prefix('/ltem')->group(function(){
    Route::any('index_add','LtemController@index_add')->name('admin.ltem.index_add.index');
    Route::any('bank_add','LtemController@bank_add')->name('admin.ltem.bank_add.index');
    Route::any('warm_add','LtemController@warm_add')->name('admin.ltem.warm_add.index');
    Route::any('lt_radio','LtemController@lt_radio')->name('admin.ltem.lt_radio.index');
    Route::any('lt_warm','LtemController@lt_warm')->name('admin.ltem.lt_warm.index');
    Route::any('lt_danger','LtemController@lt_danger')->name('admin.ltem.lt_danger.index');
    Route::any('danger_add','LtemController@danger_add')->name('admin.ltem.danger_add.index');
    Route::any('ltem_list','LtemController@ltem_list')->name('admin.ltem.ltem_list.index');
    Route::any('lt_del','LtemController@lt_del')->name('admin.ltem.lt_del.index');
    Route::any('lt_upd','LtemController@lt_upd')->name('admin.ltem.lt_upd.index');
});
//支付方式
Route::prefix('/pay')->group(function() {
    Route::any('pay_add','Pay\PayController@pay_add');//支付方式添加
    Route::any('pay_add_do','Pay\PayController@pay_add_do');//支付方式添加执行
    Route::any('pay_list','Pay\PayController@pay_list');//支付方式展示
    Route::any('pay_del','Pay\PayController@pay_del');//支付方式删除
    Route::any('pay_edit','Pay\PayController@pay_edit');//支付方式修改
    Route::any('pay_edit_do','Pay\PayController@pay_edit_do');//支付方式修改执行
});

//购买课程
Route::prefix('/buy')->group(function() {
    Route::any('buy_class','Buy\BuyController@buy_class');//购买课程
    Route::any('car','Buy\BuyController@car');//gouwuche
    Route::any('buy_del','Buy\BuyController@buy_del');//删除
    Route::any('buy_pay','Buy\BuyController@buy_pay');//购买
    Route::any('buy_pay_do','Buy\BuyController@buy_pay_do');//购买

});

//会员模块
Route::prefix('/user')->group(function(){
    Route::any('user_list','admin\UserController@user_list');//会员列表
    Route::any('card','admin\UserController@card');//会员修改状态
    Route::any('index','admin\UserController@index');//会员修改状态
    Route::any('index_do','admin\UserController@index_do');//会员修改状态
});
//导航栏
Route::any('home', 'admin\admin@home'); //添加
Route::any('home_do', 'admin\admin@home_do');   //添加执行
Route::any('home_list', 'admin\admin@home_list');   //添加执行
Route::any('home_del', 'admin\admin@home_del');   //删除


//讲师管理
Route::get('lecturer', 'admin\admin@lecturer');
//讲师视图
Route::any('lecturerAdd','admin\admin@lecturerAdd');
//讲师软删除
Route::any('del/{lect_id}','admin\admin@del');

//添加讲师
Route::any('lecturerAddhandel','admin\admin@lecturerAddhandel');
//讲师展示
Route::any('lecturerIndex','admin\admin@lecturerIndex');
Route::get('admin_update', 'admin\admin@admin_update');
Route::post('admin_update_add', 'admin\admin@admin_update_add');




