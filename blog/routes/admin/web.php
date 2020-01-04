<?php

Route::group(['prefix' => "admin"],function(){
    Route::get("/test",function(){
        return "asd";
    });
});