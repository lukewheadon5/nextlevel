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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile' , 'ProfileController')->middleware('auth');
Route::resource('team' , 'TeamController')->middleware('auth');
Route::get('/join/{id}', 'TeamController@join')->name('join')->middleware('auth');
Route::get('/myTeams' , 'TeamController@myTeams')->name('myTeams')->middleware('auth');
Route::get('/video/{id}' , 'VideoController@player')->name('player')->middleware('auth');
Route::get('/video/{id}/create' , 'VideoController@create')->name('vidCreate')->middleware('auth');
Route::post('/video/{id}/store' , 'VideoController@store')->name('vidStore')->middleware('auth');
Route::get('/video/{teamid}/playlist/{playid}' , 'VideoController@playlist')->name('playlistVid')->middleware('auth');




