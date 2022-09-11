<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post; 
use App\Models\User; 
use Mail;
use App\Mail\PostCommentEmail;

class PostCommentAddedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $postId;
    protected $comment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($postid,$comment)
    {
        $this->postId = $postid;
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userId = Post::select('user_id')->where('id',$this->postId)->first(); 
        $userEmail = User::select('email')->where('id',$userId['user_id'])->first();
        Mail::to($userEmail['email'])->send(new PostCommentEmail($this->comment));
    }
}
