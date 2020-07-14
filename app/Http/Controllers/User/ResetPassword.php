<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail,App\User;
use Illuminate\Support\Str;

class ResetPassword extends Controller
{
    public function postResetPw(Request $request){
        $email = $request['email'];
        $user = User::where('email', $email)->first();
    	if($user){
            $random = Str::random(60);
            $user->update(['remember_token' => $random]);
            $link = url('user/password/reset')."/".$random;
            $data = array('name'=>"Blog du lịch");
            Mail::send('home.sendmail', ['link' => $link], function ($m) use ($user){
                $m->to($user->email)->subject('Đổi mật khẩu');
            });
            return redirect()->back()->with("alert","Link đổi mật khẩu đã được gửi vào ".$email
            .". Vui lòng kiểm tra mail để đổi mật khẩu của bạn");
    	} else {
    		return redirect()->back()->with("alert",'Email chưa được đăng ký, vui lòng kiểm tra lại!');
    	}
    }
    public function checktoken($remember_token){
        $result = User::where('remember_token', $remember_token)->first();
    	if($result){
            $data['token'] = $result->remember_token;
    		return view('home.resetpassword', $data);
        }
    }
    public function newPass(Request $request)
    {
        $this -> validate($request,[
            'password' => 'min:6',
            'repassword' => 'same:password',
        ],[
            'password.min' => 'Mật khẩu có ít nhất 6 ký tự !',
            'repassword.required' => 'Mật khẩu không khớp !'
        ]);
            $token = $request->token;
            $result = User::where('remember_token', $token)->first();
            $result->update(['password'=>bcrypt($request->password)]);
            $result->remember_token = null;
            $result->save();
    		return redirect()->route('user.get.login')->with('alert','Đổi mật khẩu thành công');
    }
}
