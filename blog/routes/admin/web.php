<?php


Route::group(['prefix' => "admin",'namespace' => 'Admin'],function(){
    //后台登录
    Route::get("/login",'EntryController@loginForm');
    //登录处理
    Route::post("/login",'EntryController@login');
    //获取验证码
    Route::get("/code",'EntryController@code');
    //后台爱登录主页
    Route::get("/index",'EntryController@index');

    //退出登录
    Route::get("/logout",'EntryController@logout');

    //修改密码
    Route::get("/changPassword",'MyController@posswordForm');
    Route::post("/changPassword",'MyController@changPassword');

    //标签管理
    Route::resource('tag', 'TagController');

    //课程管理
    Route::resource('lesson', 'LessonController');

});
