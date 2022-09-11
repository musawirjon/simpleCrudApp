<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post; 

class PostsController extends Controller
{
    public function index(Request $request){
        $user = Auth()->user();
        $userPosts = $user->posts()->get();
        return view('dashboard', compact("userPosts"));
    }
    public function create(Request $request){
        return view('create-posts');
    }
    public function createUserPosts(Request $request){
        $user = Auth()->user(); 
        if($request->content && $request->title){
            
            $post = ([
                'title'   => $request->title,
                'content' => $request->content,
                'user_id' => Auth()->id()
            ]);

            Post::create($post);
            return redirect()->back()->with('message', 'Post created successfully!');
        }else{
            $errorOf = !$request->content ? 'content' : 'title';
            return redirect()->back()->with('error', 'Please provide '.$errorOf.' to post!');
        }
    }
}
