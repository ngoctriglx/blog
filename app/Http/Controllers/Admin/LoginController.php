<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth,App\admin,Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function getLogin(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.get.dashboard');
        }
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        
        if(Auth::guard('admin')->attempt(['username' => $username , 'password' => $password])){
            return redirect()->route('admin.get.dashboard');
        }
        else{
            $admin = DB::table('admin')->where('username', $username)->first();
            if(!empty($admin)){
                return back()->with('error','Sai mật khẩu !');
            }else
            return back()->with('error','Bắt đầu với facebook hoặc gmail để tạo tài khoản !');
        }
    }
    public function getLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.get.login');
    }
}
