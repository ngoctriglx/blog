<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cmt,App\Replycmt,Auth,DB;

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
            return response();
        }
        else{
            return response()->json(['error'=>'Bạn chưa đăng nhập.']);
        }
    }
    public function postReplyComment(Request $request){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $replycmt = new Replycmt;
            $replycmt['user_id'] = $user_id;
            $replycmt['comment_id'] = $request->input('cmt_id');
            $replycmt['content'] = $request->input('content');
            $replycmt->save();
            return response();
        }
        else{
            return response()->json(['error'=>'Bạn chưa đăng nhập.']);
        }
    }
    public function postRepostComment(Request $request){
        $status = $request->input('status');
        if ($status == "comment") {
            $cmt_id = $request->input('cmt_id');
            $comment = Cmt::find($cmt_id);
            $comment['repost'] += 1;
            $comment->save();
            return response()->json(['success'=>'Tố cáo thành công.']);
        } else {
            if ($status == "replycomment") {
                $cmt_id = $request->input('cmt_id');
                $repostcomment = Replycmt::find($cmt_id);
                $repostcomment['repost'] += 1;
                $repostcomment->save();
                return response()->json(['success'=>'Tố cáo thành công.']);
            }
        }
    }
}
