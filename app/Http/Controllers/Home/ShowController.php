<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post,App\Imgpost,App\User,App\Cmt,App\Info,Auth;

class ShowController extends Controller
{
    public function getHome(){
        return view('home.home');
    }
    
    public function getBlog(){
        $post = DB::table('post')->orderBy('updated_at','desc')->paginate(20);
        
        $imgpost = array();
        foreach ($post as $value) {
            $post_id = $value->id;
            $imgpost[] = DB::table('imgpost')->where('post_id',$post_id)->limit(1)->get(); 
        }
        return view('home.blog',['post' => $post, 'imgpost' => $imgpost]);
    }

    public function getBlogdetail($title){
        $id_post ="";
        $imgavt = "";
        $post = DB::table('post')->where('title',$title)->get();
        foreach($post as $val){
            $id_post = $val->id;
            $n = Post::find($id_post);
            $n['view'] += 1;
            $n->save();
            $imgavt = DB::table('imgpost')->where('post_id',$id_post)->limit(1)->get();
        }
        $cmt = DB::table('comment')->where('post_id','=',$id_post)->orderBy('updated_at','desc')->get();
        $user = DB::table('users')->get();
        $replycmt = DB::table('replycomment')->orderBy('updated_at','desc')->get();
        $imgpost = DB::table('imgpost')->get();
        if(Auth::check()){
            $info = Info::where('user_id',Auth::User()->id)->get();
        }
        $infocmt = Info::all();
        return view('home.blogdetail',['post'=>$post,'info'=>$info,'infocmt'=>$infocmt,'cmt'=>$cmt,'user'=>$user,'replycmt'=>$replycmt,'imgpost'=>$imgpost,'imgavt'=>$imgavt]);
    }
}
