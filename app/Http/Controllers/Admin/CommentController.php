<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CommentController extends Controller
{
    public function postDeleteCmt(Request $request){
        // $status = $request->input('status');
        $status = $request->comment;

        if ($status == "comment") {
            $cmt_id = $request->id;
            DB::table('comment')->where('id',$cmt_id)->delete();
            return back()->with('alert','Xóa comment thành công.');
        } else {
            if ($status == "replycomment") {
                $cmt_id = $request->id;
                DB::table('replycomment')->where('id',$cmt_id)->delete();
                return back()->with('alert','Xóa comment thành công.');
            }
        }
        
    }
}
