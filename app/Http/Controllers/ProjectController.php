<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\ProjectCategory;
use App\ProjectComment;
use App\ProjectCommentReply;
use App\ProjectOwner;
use App\ProjectPackage;
use App\ProjectUpdate;

class ProjectController extends Controller
{  

    public function SingleProjectIntro($project_id)
    {
        //07-crowdfunding-sec1
        $project = Project::findOrFail($project_id);

        $project_current_fund = 1;

        foreach ($project->packages as $package)
        {
            
            $project_current_fund += $package->price * $package->sponsor_count;
            
        }

        $data = json_decode($project, true);
        $arr_item['project_current_fund'] = $project_current_fund;
        array_push( $data, $arr_item );
        
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function EditSingleProject(Request $request, $project_id)
    {
        //07-crowdfunding-sec1
        //To-do: not yet
        //$project = Project::findOrFail($project_id);

        $project = Project::findOrFail($project_id);


        $sample->update($request->all());
        
        return response()->json([
            'id' => $project_id,
            'category_id' => '3',
            'title' => '與雞排妹一起學英文',
            'video_url' => 'https://www.youtube.com/watch?v=B1ci9EhgyCM',
            'owner' => '雞排妹&Hiroshi',
            'funding_target' => '1200000',
            'current_fund' => '150000',
            'start_date' => '2019/2/1',
            'due_date' => '2019/3/15',
        ]);

    }

    public function ListAllPackages($project_id)
    {
        //07-crowdfunding-sec2
        $project = Project::findOrFail($project_id);

        return response()->json([
            'status' => 'success',
            'data' => $project->packages
        ]);

    }

    public function RetrieveContent($project_id)
    {
        //09-crowdfunding-sec3

        $project = Project::findOrFail($project_id);

        return response()->json([
            'status' => 'success',
            'data' => $project->content
        ]);

    }
    
    public function ListAllComments($project_id)
    {
        //10-crowdfunding-sec4

        $project = Project::findOrFail($project_id);

        //$pcomments = json_decode($project->comments, true);
        

        $data = [];

        foreach ($project->comments as $comment)
        {
            $arry = json_decode($comment, true);
            array_push( $arry, $comment->replies );
            array_push( $data, $arry );
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);

    }

    public function CreateComment($project_id)
    {
        // To-do
        // 10-crowdfunding-sec4 

         return response()->json([
            'id' => $project_id,
            'comments' => [
                '1' => [
                    'comment_id' => 7,
                    'user_id' => 123456789,
                    'comment' => 'Can I kiss her?',
                    'created_at' => '2019/2/1 20:00:00',
                    'updated_at' => '2019/2/1 20:00:00',
                ]
            ]
         ]);
    }

    public function EditSingleComment($project_id,$comment_id)
    {
        // To-do
        // 10-crowdfunding-sec4 

         return response()->json([
            'id' => $project_id,
            'comments' => [
                '1' => [
                    'comment_id' => $comment_id,
                    'user_id' => 123456789,
                    'comment' => 'Can I hug her?',
                    'created_at' => '2019/2/1 20:00:00',
                    'updated_at' => '2019/2/1 20:00:00',
                ]
            ]
         ]);
    }

    public function DeletesSingleComment($project_id,$comment_id)
    {
        // To-do
        // 10-crowdfunding-sec4 

         return response()->json([
            'id' => $project_id,
            'comments' => [
                '1' => [
                    'comment_id' => $comment_id,
                    'user_id' => 123456789,
                    'comment' => 'Can I hug her?',
                    'created_at' => '2019/2/1 20:00:00',
                    'updated_at' => '2019/2/1 20:00:00',
                ],
            ]
         ]);
    }

    public function CreateSingleReply($project_id,$comment_id)
    {
        // To-do

        return response()->json([
            'id' => $project_id,
            'comments' => [
                '1' => [
                    'comment_id' => $comment_id,
                    'user_id' => 123456789,
                    'comment' => 'Can I hug her?',
                    'created_at' => '2019/2/1 20:00:00',
                    'updated_at' => '2019/2/1 20:00:00',
                    'replies' => [
                        '1' => [
                            'reply_id' => 1,
                            'user_id' => 987654321,
                            'reply' => 'Yes You can',
                            'created_at' => '2019/2/1 22:00:00',
                            'updated_at' => '2019/2/1 22:00:00',
                        ],
                    ]
                ]
            ]
         ]);
    }

    public function EditSingleReply($project_id,$comment_id,$reply_id)
    {
        // To-do

        return response()->json([
            'id' => $project_id,
            'comments' => [
                '1' => [
                    'comment_id' => $comment_id,
                    'user_id' => 123456789,
                    'comment' => 'Can I hug her?',
                    'created_at' => '2019/2/1 20:00:00',
                    'updated_at' => '2019/2/1 20:00:00',
                    'replies' => [
                        '1' => [
                            'reply_id' => $reply_id,
                            'user_id' => 987654321,
                            'reply' => 'Yes You can',
                            'created_at' => '2019/2/1 22:00:00',
                            'updated_at' => '2019/2/1 22:00:00',
                        ],
                    ],
                ],
            ]
         ]);
    }


    public function ListAllUpdates($project_id)
    {
        
        $project = Project::findOrFail($project_id);

        return response()->json([
            'status' => 'success',
            'data' => $project->updates
        ]);

        
    }

    public function ShowSingleUpdate($project_id,$update_id)
    {
         //11-crowdfunding-sec5

         $update = ProjectUpdate::findOrFail($update_id);

         return response()->json([
            'status' => 'success',
            'data' => $update
        ]);

    }

    public function ListAllQuestions($project_id)
    {
        //11-crowdfunding-sec6

        return response()->json([
            'id' => $project_id,
            'questions' => [
                '1' => [
                    'question_id' => 1,
                    'question' => 'how are you?',
                    'reply' => 'I am fine thank you and you.',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ],
                '2' => [
                    'question_id' => 2,
                    'question' => 'how are you?',
                    'reply' => 'I am fine thank you and you.',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ],
                '3' => [
                    'question_id' => 3,
                    'question' => 'how are you?',
                    'reply' => 'I am fine thank you and you.',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ],
                '4' => [
                    'question_id' => 4,
                    'question' => 'how are you?',
                    'reply' => 'I am fine thank you and you.',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ]
            ],
        ]);

    }



    
}
