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

Route::get('/','PagesController@index')->name('halamanUtama');

Auth::routes();

Route::group(['middleware' => ['auth','Checkrole:super_admin']], function(){
    
    Route::get('/uploadPost','PagesController@upload')->name('upload');
    Route::get('/addAdmin','PagesController@addAdmin')->name('tambahAdmin');
    Route::get('/daftar_admin','AdminController@daftar_admin')->name('daftar_admin');
    Route::post('/addAdmin/register','AdminController@store')->name('insert_admin');
    Route::get('/admin/{admin}/update','AdminController@edit');
    Route::patch('/admin/{admin}','AdminController@update');
    Route::delete('/admin/{admin}/delete','AdminController@destroy');
    Route::post('/daftar_admin','AdminController@search')->name('search');
    Route::get('/admin/{admin}/export','AdminController@export')->name('admin');
    Route::get('/admin/addstudents','AdminController@create')->name('tambahStudents');
    Route::post('/addStudents','AdminController@addStudents')->name('insert_students');

});

Route::group(['middleware' => ['auth','Checkrole:super_admin,admin']],function(){

    Route::get('/admin/createPost','PostController@create')->name('createPost');
    Route::post('/admin/inputPost','PostController@store')->name('inputPost');
    Route::delete('/delete/{post}/admin','PostController@destroy')->name('hapusPost');
    Route::get('/{post}/update/post','PostController@edit')->name('updatePost');
    Route::patch('update/proses/{post}','PostController@update');
    
});

Route::group(['middleware' => ['auth','Checkrole:super_admin,admin,students']],function(){
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{admin}','AdminController@show')->name('show');
    Route::get('/students/post/{admin}','PostController@students')->name('post');
    Route::get('/post/{post}','PostController@showPost')->name('showPost');
    Route::get('/post/{prodi}','PostController@PostProdi');
});