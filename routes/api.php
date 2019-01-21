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
Route::put('projects/{project_id}', 'ProjectController@EditSingleProject');

Route::get('projects/{project_id}/packages', 'ProjectController@ListAllPackages');

Route::get('projects/{project_id}/content', 'ProjectController@RetrieveContent');

Route::get('projects/{project_id}/comments', 'ProjectController@ListAllComments');
Route::post('projects/{project_id}/comments', 'ProjectController@CreateComment');
Route::put('projects/{project_id}/comments/{comment_id}', 'ProjectController@EditSingleComment');
Route::delete('projects/{project_id}/comments/{comment_id}', 'ProjectController@DeletesSingleComment');
Route::post('projects/{project_id}/comments/{comment_id}/replies', 'ProjectController@CreateSingleReply');
Route::put('projects/{project_id}/comments/{comment_id}/replies/{reply_id}', 'ProjectController@EditSingleReply');

Route::get('projects/{project_id}/updates', 'ProjectController@ListAllUpdates');
Route::get('projects/{project_id}/updates/{update_id}', 'ProjectController@ShowSingleUpdate');

Route::get('projects/{project_id}/questions', 'ProjectController@ListAllQuestions');

Route::get('account/projects', 'MyPageController@ListAllPackages');
Route::put('account', 'MyPageController@EditAccount');
Route::delete('account', 'MyPageController@DeleteAccount');
