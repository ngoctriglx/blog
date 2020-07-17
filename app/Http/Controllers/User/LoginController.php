<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\User,App\Info,Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function getLogin(){
        session(['link' => url()->previous()]);
        return view('home.login');
    }
    public function postLogin(Request $request){
        $email = $request->email;
		$password = $request->password;

        if(Auth::attempt(['email' => $email , 'password' => $password])){
            return redirect(session('link'));
        }
        else{
            $user = DB::table('users')->where('email', $email)->first();
            if(!empty($user)){
                $password = $user->password;
                if (empty($password)) {
                    return back()->with('error','Tài khoản chưa đặt mật khẩu !');
                }else
                return back()->with('error','Sai mật khẩu !');
            }else
            return back()->with('error','Tài khoản không tồn tại !');
        }
    }
    
    public function getLogout(){
        if(!Auth::check()){
            return redirect()->back();
        }
        Auth::logout();
        return redirect()->back();
    }

    public function getFacebookRedirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function getFacebookCallback($provider){
        try {
            $facebook = Socialite::driver($provider)->user();
            if(!$facebook->email){
                return back()->with("error","Tài khoản chưa liên kết gmail");
            }
            else{
                $count = User::where('email',$facebook->email)->count();
                $finduser = User::where('email',$facebook->email)->first();
                if($count > 0){
                    Auth::login($finduser);
                    return redirect(session('link'));
                }
                else{
                    $user = new User;
                    $user['email'] =  $facebook->email;
                    $user->save();
                    $user_id = $user->id;
                    $info = new info;
                    $info['user_id'] = $user_id;
                    $info['name'] = $facebook->name;
                    $info['avatar'] = $facebook->avatar;
                    $info->save();
                    Auth::login($user);
                    return redirect(session('link'));
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getGoogleRedirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function getGoogleCallback($provider){
        try {
            $google = Socialite::driver($provider)->user();
            $finduser = User::where('email', $google->email)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect(session('link'));
           }else{
                $user = new User();
                $user['email'] = $google->email;
                $user->save();
                $user_id = $user->id;
                $info = new info();
                $info['user_id'] = $user_id;
                $info['name'] = $google->name;
                $info->save();
                Auth::login($user);
                return redirect(session('link'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
