<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cmt,App\Replycmt,Auth;

class CmtController extends Controller
{
    public function postComment(Request $request){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $cmt = new Cmt;
            $cmt['user_id'] = $user_id;
            $cmt['post_id'] = $request->input('post_id');
            $cmt['content'] = $request->input('content');
            $cmt->save();
            return response()->json(['success'=>'']);
        }
        else{
            return back()->with('alert' , 'Bạn chưa đăng nhập !');
        }
    }
    public function postReplyComment(Request $request , $cmt_id){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $replycmt = new Replycmt;
            $replycmt['user_id'] = $user_id;
            $replycmt['comment_id'] = $cmt_id;
            $replycmt['content'] = $request['content2'];
            $replycmt->save();
            return back();
        }
        else{
            return back()->with('alert' , 'Bạn chưa đăng nhập !');
        }
    }
}
