<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,DB;

class LikeShareController extends Controller
{
    public function postLike(Request $request){
        if (Auth::check()) {
            $status = $request->input('status');
            $post_id = $request->input('post_id');
            if ($status == "like") {
                $user_id = Auth::user()->id;
                DB::table('likepost')->insert(['post_id' => $post_id,'user_id'=>$user_id]);
                return response()->json(['success'=>'']);
            }else
            if ($status == "disklike") {
                $user_id = Auth::user()->id;
                DB::table('likepost')->where([
                    ['user_id', $user_id],
                    ['post_id',$post_id],
                 ])->delete();
                 return response()->json(['success'=>'']);
            }
        }else
        return response()->json(['success'=>'']);
    }
}
