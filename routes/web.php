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
//Auth::routes();


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);