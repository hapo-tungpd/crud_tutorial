<?php

Route::get('/','CreatesController@home');
Route::get('/create','CreatesController@create');
Route::post('/insert','CreatesController@add');
Route::get('/update/{id}','CreatesController@update');
Route::post('/edit/{id}','CreatesController@edit');
Route::get('/read/{id}','CreatesController@read');
Route::get('/delete/{id}','CreatesController@delete');
Route::post('/search','CreatesController@search');


