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

Route::group(['middleware' => ['guest']], function (){
    Route::get("/", "PageController@login");
    Route::post("/login", "AuthController@ceklogin");
});

Route::group(['middleware' => ['auth']], function (){
    Route::get("/user", "PageController@formedituser");
    Route::post("/updateuser", "PageController@updateuser");
    Route::get("/logout", "AuthController@ceklogout");
    Route::get("/home", "PageController@home");
    Route::get("/katalok", "PageController@katalok");
    Route::get("/layanan", "PageController@layanan");
    Route::get("/fasilitas", "PageController@fasilitas");
    Route::get("/katalok/add-form", "PageController@formaddkatalok");
    route::post("/save", "PageController@savekatalok");
    Route::get("/katalok/edit-form/{id}", "PageController@formeditkatalok");
    Route::put("/update/{id}", "PageController@updatekatalok");
    Route::get("/delete/{id}", "PageController@deletekatalok");
});