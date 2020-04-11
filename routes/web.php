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
Route::get('/highlight/{videoid}' , 'VideoController@highlight')->name('highlightVid')->middleware('auth');

Route::get('/team/{id}/members' , 'TeamController@members')->name('members')->middleware('auth');
Route::get('/coach/{tid}/{uid}' , 'TeamController@addCoach')->name('coach')->middleware('auth');

Route::post('/highlight/save', 'HighlightController@store');
Route::post('/highlight/save/team', 'HighlightController@storeT');
Route::post('highlight/delete', 'HighlightController@destroyH')->middleware('auth');
Route::post('thighlight/delete', 'HighlightController@destroyTH')->middleware('auth');

Route::post('annotation/save', 'AnnotationController@store')->middleware('auth');
Route::post('annotation/save/circle', 'AnnotationController@storeCirc')->middleware('auth');
Route::post('annotation/save/rect', 'AnnotationController@storeRect')->middleware('auth');
Route::post('annotation/save/arrow', 'AnnotationController@storeArrow')->middleware('auth');
Route::post('annotation/save/text', 'AnnotationController@storeText')->middleware('auth');
Route::post('annotation/delete', 'AnnotationController@destroy')->middleware('auth');
Route::post('annotation/share', 'AnnotationController@share')->middleware('auth');
Route::post('annotation/update', 'AnnotationController@update')->middleware('auth');
Route::post('annotation/update/arrow', 'AnnotationController@updateArrow')->middleware('auth');
Route::post('annotation/update/text', 'AnnotationController@updateText')->middleware('auth');





