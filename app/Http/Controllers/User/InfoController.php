<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth,App\Info,App\User,Hash,Validator;

class InfoController extends Controller
{
    public function getInfo(){
        if(Auth::check()){
            $info = DB::table('info')->where('user_id',Auth::user()->id)->get();
            $user = DB::table('users')->where('id',Auth::user()->id)->get();
            return view('home.infouser',['info' => $info, 'user' =>$user]);
        }
        return view('home.login');
    }
    public function postInfo(Request $request){
        $name = $request->name;
        $introduce = $request->introduce;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $info = Info::where('user_id',$user_id);
            if(!empty($name)){
                $info->update(['name' => $name]);
            }
            if(!empty($introduce)){
                $info->update(['introduce' => $introduce]);
            }
            if($request->hasFile('images')){
                $images = $request->file('images');
                $extension = $images->getClientOriginalExtension();
                $namefile = $user_id.Str::random(30).'.'.$extension;
                $images->move(public_path().'/uploads/imguser/', $namefile);
                $info->update(['avatar' => $namefile]);
            }
            return back()->with('error','Cập nhập thành công');
        }
    }
    public function postChangepw(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'pass1' => 'bail|min:6|unique:users,password',
        //     'pass2' => 'same:pass1'
        // ] , [
        //     'pass1.min' => 'Mật phai co 6 ky tu tro len',
        //     'pass1.unique' => 'Mật khẩu mới phải khác mật khẩu cũ!',
        //     'pass2.same' => 'Mật khẩu nhập lại không khớp !'
        // ]);
        //if ($validator->passes()) {
            // $pass0 = bcrypt($request->input('pass0'));
            // $pass1 = $request->input('pass1');
            // $pass2 = $request->input('pass2');
            // $user = DB::table('users')->where('id',Auth::user()->id);
            //if (!empty($pass0)) {
                // if(hash::check($pass0,$user->password)){
                //     return response()->json(['success'=>'Mật khẩu cũ không đúng']);
                // }else{
                //     $user->update(['password' => bcrypt($pass1)]);
                    // return back()->with('alert' , 'Cập nhập thành công !');
                //     return response()->json(['success'=>'Cập nhập thành công']);
                // }
            //}else{
                //$user->update(['password' => bcrypt($pass1)]);
                // return response()->json(['success'=>'Cập nhập thành công']);
                return back()->with('alert','Cập nhập thành công !');
            //}
        //}else{
            //return response()->json(['error'=>$validator->errors()->all()]);
        //}
    }
}
