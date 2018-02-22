<?php

Route::get('/search',"EmployeesController@search");
Route::resource('employee', 'EmployeesController');
