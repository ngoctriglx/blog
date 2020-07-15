<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post,App\Imgpost,App\User,App\Cmt,App\Info,Auth;
use Illuminate\Support\Facades\URL;

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

    public function getBlogdetail($id){
        $id_post ="";
        $imgavt = "";
        $post = DB::table('post')->where('id',$id)->first();
        //foreach($post as $val){
            $id_post = $post->id;
            $n = Post::find($id_post);
            $n['view'] += 1;
            $n->save();
            $imgavt = DB::table('imgpost')->where('post_id',$id_post)->limit(1)->get();
        //}
        $cmt = DB::table('comment')->where('post_id','=',$id_post)->orderBy('updated_at','desc')->get();
        $user = DB::table('users')->get();
        $replycmt = DB::table('replycomment')->orderBy('updated_at','desc')->get();
        $imgpost = DB::table('imgpost')->get();
        $infocmt = Info::all();
        $urlshare = URL::current();
        $i=0;
        foreach ($cmt as $key => $value) {
           $sumrely = DB::table('replycomment')->where('comment_id',$value->id)->get();
           foreach ($sumrely as $key => $value) {
               $i+=1;
           }
        }
        $sumcmt = $cmt->count()+$i;
        if(Auth::check()){
            $info = DB::table('info')->where('user_id',Auth::User()->id)->first();
            $likepost = DB::table('likepost')->where([
                ['user_id', Auth::User()->id],
                ['post_id',$id],
             ])->first();
            return view('home.blogdetail',['post'=>$post,'info'=>$info,'infocmt'=>$infocmt,'cmt'=>$cmt,'user'=>$user,'replycmt'=>$replycmt,'imgpost'=>$imgpost,'imgavt'=>$imgavt,'likepost'=> $likepost,'urlshare'=>$urlshare,'sumcmt'=>$sumcmt]);
        }
        return view('home.blogdetail',['post'=>$post,'infocmt'=>$infocmt,'cmt'=>$cmt,'user'=>$user,'replycmt'=>$replycmt,'imgpost'=>$imgpost,'imgavt'=>$imgavt,'sumcmt'=>$sumcmt]);
    }
}
