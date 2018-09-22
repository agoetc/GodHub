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



Route::get('/', 'HomeController@index')->name('home');


Route::get('/god/detail/{id}/', 'GodController@detail');
Route::post('god/detail/{id}/worship', 'GodController@worship');
Route::get('/god/detail/{id}/schedule/', 'ScheduleController@create');
Route::post('/god/detail/{id}/schedule/post', 'ScheduleController@post');

Route::get('/god/create', function () {
    return view('god.create');
});

Route::get('/god/schedule/add', function () {
    return view('god.schedule.add');
});


Route::post('/god/create/post', 'GodController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/god/myPage/myGod', function () {
    return view('myPage.myGod');
});

Route::get('/god/myPage/worship', function () {
    return view('myPage.worship');
});
