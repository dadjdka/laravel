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




Route::get('/', function () {
   
    return view('test',['name' => 'nihao']);
});

Route::post('/check','TestController@index');

// Route::get('/', 'TestController@index');
// Route::get('/', function () {
//     return view('welcome');
// });
