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

Route::get('/statistics/team/{id}' , 'StatisticController@statScreen')->name('stats')->middleware('auth');
Route::get('/statistic/team/{tid}/season/{sid}' , 'StatisticController@showSeason')->middleware('auth');
Route::get('/statistic/team/{tid}/game/{gid}' , 'StatisticController@showGame')->middleware('auth');
Route::get('/statistic/team/{tid}/user/{uid}' , 'StatisticController@playerCareer')->middleware('auth');
Route::get('/statistic/career/{cid}/user/{uid}' , 'StatisticController@playerCareer2')->middleware('auth');
Route::get('/statistic/season/{sid}/user/{uid}' , 'StatisticController@playerSeason')->middleware('auth');
Route::get('/statistic/game/{gid}/user/{uid}' , 'StatisticController@playerGame')->middleware('auth');
Route::get('/statistic/game/{gid}/user/{uid}/training' , 'StatisticController@playerTrain')->middleware('auth');
Route::get('/statistic/team/{gid}/game/{uid}/training' , 'StatisticController@showTrain')->middleware('auth');


Route::get('/statistic/add/{tid}/game/{gid}' ,'StatisticController@addPG')->middleware('auth');
Route::get('/statistic/add/{tid}/season/{sid}' ,'StatisticController@addPS')->middleware('auth');

Route::get('/statistic/add/{tid}/game/{gid}/user/{uid}' ,'StatisticController@addPGU')->middleware('auth');
Route::get('/statistic/add/{tid}/season/{gid}/user/{uid}' ,'StatisticController@addPSU')->middleware('auth');

Route::get('/statistic/{id}/season/create' , 'StatisticController@createSeason')->name('createS')->middleware('auth');
Route::get('/statistic/{id}/game/create' , 'StatisticController@createGame')->name('createG')->middleware('auth');
Route::post('/season/save' , 'StatisticController@storeSeason');
Route::post('/game/save' , 'StatisticController@storeGame');

Route::get('/statistic/team/{tid}/game/{gid}/update' , 'StatisticController@updateview')->middleware('auth');
Route::post('/game/player/update' , 'StatisticController@updatePGame');
Route::post('/game/offence/update' , 'StatisticController@updateOGame');
Route::post('/game/defence/update' , 'StatisticController@updateDGame');
Route::get('/statistic/games/get/{sid}' , 'StatisticController@get_by_season');
Route::post('/increment/stat', 'StatisticController@incStat');

Route::get('/statstic/game/{gid}/update/train' , 'StatisticController@updateTrainView')->name('trainUp')->middleware('auth');
Route::post('/game/player/train/update' , 'StatisticController@updatePTrain');


Route::get('tasks/create/{id}' , 'TasksController@create')->name('taskCreate')->middleware('auth');
Route::post('tasks/store' , 'TasksController@store');
Route::get('calendar/{id}' , 'TasksController@calendar')->name('calendar')->middleware('auth');
Route::get('tasks/edit/{id}' , 'TasksController@edit')->name('cEdit')->middleware('auth');
Route::get('tasks/show/{id}' , 'TasksController@show')->name('taskShow')->middleware('auth');
Route::post('tasks/update/{id}' , 'TasksController@update')->name('taskUpdate');
Route::get('tasks/destroy/{id}' , 'TasksController@destroy')->name('taskDestroy');

Route::post('team/search', 'TeamController@search')->name('search');


Route::get('team/{id}/roster' , 'RosterController@rosterCenter')->name('roster')->middleware('auth');
Route::get('team/{id}/create/roster' , 'RosterController@rosterCreate')->name('rosterCreate')->middleware('auth');
Route::post('/store/roster' , 'RosterController@store');
Route::get('/roster/{id}' , 'RosterController@show')->name('rosterShow')->middleware('auth');
Route::get('/roster/{id}/delete', 'RosterController@destroy')->name('rosterDelete');

Route::get('team/{id}/lineup/create' , 'RosterController@lineup')->name('lineupCreate')->middleware('auth');
Route::post('/lineup/store' , 'RosterController@lineupStore');
Route::post('/lineup/af/store' , 'RosterController@lineupAFStore');


Route::get('team/{id}/playbook' , 'PlayController@playView')->name('playIndex')->middleware('auth');
Route::get('team/{id}/playbook/create' , 'PlayController@create')->name('playCreate')->middleware('auth');
Route::get('play/{id}' , 'PlayController@show')->name('playShow')->middleware('auth');
Route::get('play/{id}/edit' , 'PlayController@edit')->name('playEdit')->middleware('auth');

Route::post('/play/store' , 'PlayController@store');
Route::post('play/{id}/update' , 'PlayController@update')->name('playUpdate');
Route::get('play/{id}/destroy' , 'PlayController@destroy')->name('playDestroy');


Route::get('team/{id}/quizzes' , 'QuizController@index')->name('quizIndex')->middleware('auth');
Route::get('team/{id}/quiz/create' , 'QuizController@create')->name('quizCreate')->middleware('auth');
Route::get('quiz/{id}/edit' , 'QuizController@edit')->name('quizEdit')->middleware('auth');
Route::post('/quiz/store' , 'QuizController@store');

Route::get('quiz/{id}/addQ' , 'QuizController@addQ')->name('quizAddQ')->middleware('auth');
Route::get('quiz/{id}/addMQ' , 'QuizController@addMQ')->name('quizAddMQ')->middleware('auth');
Route::post('/quiz/storeQ' , 'QuizController@storeQ');

Route::get('quiz/{id}/show' , 'QuizController@show')->name('quizShow')->middleware('auth');
Route::get('question/{id}/answer' , 'QuizController@answerQ')->name('quizAnswerQ')->middleware('auth');
Route::post('/quiz/store/result' , 'QuizController@storeResult');

Route::get('quiz/{id}/destroy' , 'QuizController@destroy')->name('quizDestroy');

