<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
   return view('welcome');
});


Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show')->middleware('auth');

Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}', 'ActorsController@index');

Route::get('/actors{actor}', 'ActorsController@show')->name('actors.show')->middleware('auth');

Route::get('/tv', 'TvController@index')->name('tv.index');
Route::get('/tv/{tv}', 'TvController@show')->name('tv.show')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/secret','SecretController@index')->name('secret');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

 
 Route::get('/logout', 'Auth\LoginController@logout');


 Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
   Route::resource('/users','UsersController',['except'=>['show','create','store']]);
 });
 
 
