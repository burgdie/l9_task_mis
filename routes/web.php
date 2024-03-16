<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('departments/index', function() {
    return view('management.departments.index');
})->name('departmentsIndex');

Route::get('users/index', function() {
    return view('management.users.index');
})->name('usersIndex');
