<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\Comment; 

class CommentsController extends Controller
{
    public function createPostComment(Request $request){
    if($request->comment){

        $posts = Post::where('id',$request->id)->first();

        $comment = array([
            'comment' => $request->comment,
            'user_id' => Auth()->user()->id,
            'post_id' => $request->post_id
        ]);
        
        $addComment = Comment::create($comment);
        
        return redirect()->back()->with('message', 'Comment added successfully!');
    }else{
        return redirect()->back()->with('error', 'Please provide content to Comment!');
    }
    }
}
