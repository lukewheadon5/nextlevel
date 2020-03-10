<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/video/playlist/{playlist}/videos', 'VideoController@index');
Route::get('/video/playlist/{video}/videos/annotation', 'AnnotationController@index');

Route::middleware('auth:api')->group(function () {
    
});
