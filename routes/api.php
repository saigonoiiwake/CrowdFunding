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

Route::group(["middleware" => "guest:api"], function () {
    Route::post("/login", "ApiAuthController@login");
});

Route::group(["middleware" => "auth:api"], function () {
    // Mypage
    Route::get('account/projects', 'MyPageController@ListAllPackages');
    Route::put('account/about/edit', 'MyPageController@EditAbout');
    Route::put('account', 'MyPageController@EditAccount');
    // CrowdFunding forum
    Route::post('projects/{project_id}/comments', 'ProjectController@CreateComment');
    Route::put('projects/{project_id}/comments/{comment_id}', 'ProjectController@EditSingleComment');
    Route::delete('projects/{project_id}/comments/{comment_id}', 'ProjectController@DeletesSingleComment');
    Route::post('projects/{project_id}/comments/{comment_id}/replies', 'ProjectController@CreateSingleReply');
    Route::put('projects/{project_id}/comments/{comment_id}/replies/{reply_id}', 'ProjectController@EditSingleReply');
});

Route::group(["middleware" => "cors"], function () {
    Route::get('projects/{project_id}', 'ProjectController@SingleProjectIntro');
});
Route::get('projects/{project_id}/packages', 'ProjectController@ListAllPackages');
Route::get('projects/{project_id}/content', 'ProjectController@RetrieveContent');
Route::get('projects/{project_id}/updates', 'ProjectController@ListAllUpdates');
Route::get('projects/{project_id}/updates/{update_id}', 'ProjectController@ShowSingleUpdate');
Route::get('projects/{project_id}/questions', 'ProjectController@ListAllQuestions');
Route::get('projects/{project_id}/comments', 'ProjectController@ListAllComments');


// To-do: admin
Route::put('projects/{project_id}', 'ProjectController@EditSingleProject');



