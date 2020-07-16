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
        $post = DB::table('post')->orderBy('updated_at','desc')->paginate(10);
        return view('admin.post',['post'=>$post]);
    }
    public function getComment(){
        $comment = DB::table('comment')->orderBy('repost','desc')->paginate(10);
        $replycomment = DB::table('replycomment')->orderBy('repost','desc')->paginate(10);
        $info = DB::table('info')->get();
        return view('admin.comment',['comment'=>$comment,'info'=>$info,'replycomment'=>$replycomment]);

    }
}
