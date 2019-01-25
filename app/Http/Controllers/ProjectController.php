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

        $project_owner = $project->owners()->get();

        $project_current_fund = 0;

        $sponsor_sum = 0;

        foreach ($project->packages as $package)
        {
            $project_current_fund += $package->price * $package->sponsor_count;
            $sponsor_sum += $package->sponsor_count;
        }

        $project_current_fund_format = number_format($project_current_fund);

        $data = json_decode($project, true);
        $data['project_current_fund'] = $project_current_fund_format;
        $data['sponsor_sum'] = $sponsor_sum;
        $data['project_owner'] = $project_owner;

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function EditSingleProject(Request $request, $project_id)
    {
        //07-crowdfunding-sec1

        $this->validate($request, [
            'category_id' => 'required|integer',
            'title' => 'required',
            'owners' => 'required|integer',
            'video_url' => 'required|active_url',
            'funding_target' => 'required|integer'
          ]);    

        $project = Project::findOrFail($project_id);
        $project->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $project
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

        $data = [];

        foreach ($project->comments as $comment)
        {
            $arry = json_decode($comment, true);
            $arry['replies'] = $comment->replies;
            foreach ($comment->replies as $reply)
            {
                $replier = $reply->speaker;
            }
            $arry['commenter'] = $comment->speaker;
            array_push( $data, $arry );
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);

    }

    public function CreateComment(Request $request, $project_id)
    {
        // 10-crowdfunding-sec4 
        
        $this->validate($request, [
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
            'comment' => 'required'
          ]);    

        return ProjectComment::create($request->all());

    }

    public function EditSingleComment(Request $request, $project_id ,$comment_id)
    {
        // 10-crowdfunding-sec4 

        $this->validate($request, [
            'comment' => 'required'
          ]);    

        $comment = ProjectComment::findOrFail($comment_id);
        $comment->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ]);

    }

    public function DeletesSingleComment(Request $request, $project_id ,$comment_id)
    {
        // 10-crowdfunding-sec4 

        $comment = ProjectComment::findOrFail($comment_id);
        $comment->delete();

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ]);

    }

    public function CreateSingleReply(Request $request, $project_id, $comment_id)
    {
        // 10-crowdfunding-sec4 

        $this->validate($request, [
            'user_id' => 'required|integer',
            'comment_id' => 'required|integer',
            'reply' => 'required'
          ]);    

        return ProjectCommentReply::create($request->all());

    }

    public function EditSingleReply(Request $request, $project_id, $comment_id, $reply_id)
    {
        // To-do: auth

        $this->validate($request, [
            'reply' => 'required'
          ]);    

        $reply = ProjectCommentReply::findOrFail($reply_id);
        $reply->update($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $reply
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
        $project = Project::findOrFail($project_id);

        return response()->json([
            'status' => 'success',
            'data' => $project->questions
        ]);
    }



    
}
