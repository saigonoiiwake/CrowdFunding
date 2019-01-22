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
    //
    

    public function SingleProjectIntro($project_id)
    {
        //07-crowdfunding-sec1
        $project = Project::where('id', $project_id)->first();

        $project_current_fund = 1;

        foreach ($project->packages as $package)
        {
            // $project_current_fund += $package->price * $package->sponsor_count;
            $project_current_fund++;
        }

        
        return response()->json([
            'id' => $project->id,
            'category_id' => $project->category_id,
            'title' => $project->title,
            'video_url' => $project->video_url,
            'owner' => $project->owners,
            'funding_target' => $project->funding_target,
            'current_fund' => $project_current_fund,
            'start_date' => $project->start_date,
            'due_date' => $project->end_date,
        ]);
    }

    public function EditSingleProject($project_id)
    {
        //07-crowdfunding-sec1
        
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
        ////07-crowdfunding-sec2

        return response()->json([
                    'id' => $project_id,
                    'packages' => [
                        '1' => [
                            'id' => 1,
                            'price' => 1000,
                            'sold' => 7,
                            'content' => 'kiss'
                        ],
                        '2' => [
                            'id' => 2,
                            'price' => 3000,
                            'sold' => 9,
                            'content' => 'kiss'
                        ],
                        '3' => [
                            'id' => 3,
                            'price' => 7000,
                            'sold' => 15,
                            'content' => 'kiss'
                        ],
                        '4' => [
                            'id' => 4,
                            'price' => 49000,
                            'sold' => 7,
                            'content' => 'kiss'
                        ],
                    ],
                ]);
    }

    public function RetrieveContent($project_id)
    {
        //09-crowdfunding-sec3

        return response()->json([
            'id' => $project_id,
            'content' => 'medium_text'
        ]);
    }
    
    public function ListAllComments($project_id)
    {
        //10-crowdfunding-sec4

        return response()->json([
            'id' => $project_id,
            'comments' => [
                '1' => [
                    'comment_id' => 1,
                    'user_id' => 123456789,
                    'comment' => 'Can I kiss her?',
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
                        '2' => [
                            'reply_id' => 2,
                            'user_id' => 123456789,
                            'reply' => 'Can I >///< ??',
                            'created_at' => '2019/2/1 23:00:00',
                            'updated_at' => '2019/2/1 23:00:00',
                        ],
                    ]
                ],
                '2' => [
                    'comment_id' => 2,
                    'user_id' => 987654321,
                    'comment' => 'Can I kiss her?',
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
                        '2' => [
                            'reply_id' => 2,
                            'user_id' => 123456789,
                            'reply' => 'Can I >///< ??',
                            'created_at' => '2019/2/1 23:00:00',
                            'updated_at' => '2019/2/1 23:00:00',
                        ],
                    ]
                ],
                '3' => [
                    'comment_id' => 3,
                    'user_id' => 223344556,
                    'comment' => 'Can I kiss her?',
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
                        '2' => [
                            'reply_id' => 2,
                            'user_id' => 123456789,
                            'reply' => 'Can I >///< ??',
                            'created_at' => '2019/2/1 23:00:00',
                            'updated_at' => '2019/2/1 23:00:00',
                        ],
                    ]
                ],
                '4' => [
                    'comment_id' => 4,
                    'user_id' => 112233445,
                    'comment' => 'Can I kiss her?',
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
                        '2' => [
                            'reply_id' => 2,
                            'user_id' => 123456789,
                            'reply' => 'Can I >///< ??',
                            'created_at' => '2019/2/1 23:00:00',
                            'updated_at' => '2019/2/1 23:00:00',
                        ],
                    ]
                ],
            ],
        ]);
    }

    public function CreateComment($project_id)
    {
        // Not sure
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
        // Not sure
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
        // Not sure
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
        //11-crowdfunding-sec5
        return response()->json([
            'id' => $project_id,
            'updates' => [
                '1' => [
                    'update_id' => 1,
                    'title' => 'hello world',
                    'content' => 'hello ili',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ],
                '2' => [
                    'update_id' => 1,
                    'title' => 'hello world',
                    'content' => 'hello ili',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ],
                '3' => [
                    'update_id' => 1,
                    'title' => 'hello world',
                    'content' => 'hello ili',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ],
                '4' => [
                    'update_id' => 1,
                    'title' => 'hello world',
                    'content' => 'hello ili',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ]
            ],
        ]);
    }

    public function ShowSingleUpdate($project_id,$update_id)
    {
         //11-crowdfunding-sec5

         return response()->json([
            'id' => $project_id,
            'updates' => [
                '1' => [
                    'update_id' => $update_id,
                    'title' => 'hello world',
                    'content' => 'hello ili',
                    'created_at' => '2019/2/1 23:00:00',
                    'updated_at' => '2019/2/1 23:00:00',
                ]
            ]
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
