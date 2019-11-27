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

// Route::get('/','StudentManagement@index')->name('index');
Route::get('/',function()
{
    return view('auth.login');
}
);
Route::get('/index','StudentManagement@index')->name('index');
Route::get('/create','StudentManagement@create')->name('create');
Route::post('/store','StudentManagement@store')->name('store');
Route::get('/edit/{id}','StudentManagement@edit')->name('edit');
Route::POST('/update/{id}','StudentManagement@update')->name('update');
Route::get('/delete/{id}','StudentManagement@delete')->name('delete');
// Route::get('/logout','StudentManagement@logout')->name('logout');
Route::get('/logout',function()
{
Auth::logout();
return view('auth.login');
}
);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
