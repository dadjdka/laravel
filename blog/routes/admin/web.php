<?php



Route::group(['prefix' => "admin",'namespace' => 'Admin'],function(){
    //后台登录
    Route::get("/login",'EntryController@loginForm');
    //登录处理
    Route::post("/login",'EntryController@login');

    //后台爱登录主页
    Route::get("/index",'EntryController@index');


});
