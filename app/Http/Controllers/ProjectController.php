<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //

    public function SingleProjectIntro($project_id)
    {
        //07-crowdfunding-sec1
        
        return response()->json([
            'id' => $project_id,
            'category_id' => '3',
            'title' => '與雞排妹一起學日文',
            'video_url' => 'https://www.youtube.com/watch?v=B1ci9EhgyCM',
            'owner' => '雞排妹&Hiroshi',
            'funding_target' => '1000000',
            'packages' => [
                '1' => [
                    'id' => 1,
                    'price' => 1000,
                    'sold' => 7 
                ],
                '2' => [
                    'id' => 2,
                    'price' => 3000,
                    'sold' => 9 
                ],
                '3' => [
                    'id' => 3,
                    'price' => 7000,
                    'sold' => 15 
                ],
                '4' => [
                    'id' => 4,
                    'price' => 49000,
                    'sold' => 7 
                ],
            ],
            'start_date' => '2019/2/1',
            'due_date' => '2019/3/10',
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
