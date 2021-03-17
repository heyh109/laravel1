<?php

Route::get('/', 'PagesController@home')->name('index');

Route::get('/create', 'PagesController@create')->name('create');

Route::get('/jianjie', 'PagesController@jianjie')->name('jianjie');

Route::get('/zhengzhou', 'PagesController@zhengzhou')->name('zhengzhou');
Route::post('/store', 'PagesController@store')->name('store');

Route::get('/edit/{id}', 'PagesController@edit')->name('edit');
Route::post('/update', 'PagesController@update')->name('update');

Route::get('/delete/{id}', 'PagesController@delete')->name('delete');
//Route::get('/ruofugai', 'JzruofPagesController@ruofugai')->name('ruofugai');
Route::get('/create', 'jzruofPagesController@create')->name('create');
Route::get('/ruofugai', 'JzruofPagesController@jianjie')->name('ruofugai');

//搜索基站信息
Route::post('/jizhan/search', 'JizhanController@index')->name('jizhan.search');
//用户登录
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
