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


// Route::get('/{id}', function ($id) {
//     return $id;
// })->where(["id" => "[0-9]+","name" => "[a-z]+"]);


// Route::get('/', 'TestController@text');

// Route::get('/', 'TestController@updateSysConfig');

// Route::get('/', function () {

//     return view('test',['name' => 'nihao']);
//     // return view('test',['name' => 'nihao']);
// });

// Route::post('/check','TestController@index');
// Route::post('/checkCapt','TestController@checkCapt');
// Route::get('/captchaShow','TestController@captchaShow');


// Route::get('/', 'TestController@index');
Route::get('/', function () {
    return view('welcome');
});

Route::any('/component/uploader', 'Component\UploadController@uploader');
Route::any('/component/fileslists', 'Component\UploadController@fileslists');
include __DIR__."/admin/web.php";

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
