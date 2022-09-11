<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\Comment; 
use App\Jobs\PostCommentAddedJob;

class CommentsController extends Controller
{
    public function createPostComment(Request $request){
    if($request->comment){ 
        $posts = Post::where('id',$request->id)->first();
  
        $addComment = Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth()->user()->id,
            'post_id' => $request->id
        ]);
        
        $commentData = ([
            'comment' => $request->comment
        ]);

        dispatch(new PostCommentAddedJob($request->id, $commentData));
        return redirect()->back()->with('message', 'Comment added successfully!, email Notify will sent to post owner');
    }else{
        return redirect()->back()->with('error', 'Please provide content to Comment!');
    }
    }
}
