<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function getDashboard(){
        return view('admin.dashboard');
    }
    public function getPost(){
        $post = DB::table('post')->orderBy('updated_at','desc')->get();
        return view('admin.post',['post'=>$post]);
    }
    public function getComment(){
        // $comment = DB::table('comment')->orderBy('repost','desc')->get();
        // $replycomment = DB::table('replycomment')->orderBy('repost','desc')->get();
        // $posts = Post::join('comments', 'posts.id', '=', 'comments.post_id')
        // ->orderBy('comments.some_field', 'DESC')
        // ->get();
        $info = DB::table('info')->get();
        $comment = DB::table('comment')->join('replycomment','comment.id','=','replycomment.comment_id')
        ->orderBy('replycomment.repost','desc')->get();
        return view('admin.comment',['comment'=>$comment,'info'=>$info]);
        
    }
}
