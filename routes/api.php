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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('projects/{project_id}', 'ProjectController@SingleProjectIntro');
Route::get('projects/{project_id}/packages', 'ProjectController@ListAllPackages');
Route::get('projects/{project_id}/content', 'ProjectController@RetrieveContent');
Route::get('projects/{project_id}/comments', 'ProjectController@ListAllComments');
Route::get('projects/{project_id}/updates', 'ProjectController@ListAllUpdates');
Route::get('projects/{project_id}/questions', 'ProjectController@ListAllQuestions');