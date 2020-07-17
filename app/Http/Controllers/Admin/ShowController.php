<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function getDashboard(){
        $post = DB::table('post')->count();
        $user = DB::table('users')->count();
        $comment = DB::table('comment')->count();
        $replycomment = DB::table('replycomment')->count();
        $sumcmt = $comment + $replycomment;
        return view('admin.dashboard',['post'=>$post,'user'=>$user,'sumcmt'=>$sumcmt]);
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
