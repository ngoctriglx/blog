<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CommentController extends Controller
{
    public function postDeleteCmt(Request $request){
        $status = $request->input('status');
        if ($status == "comment") {
            $cmt_id = $request->input('id');
            DB::table('comment')->where('id',$cmt_id)->delete();
            return response()->json(['success'=>'Xóa comment thành công.']);
        } else {
            if ($status == "replycomment") {
                $cmt_id = $request->input('id');
                DB::table('replycomment')->where('id',$cmt_id)->delete();
                return response()->json(['success'=>'Xóa replycomment thành công.']);
            }
        }
        
    }
}
