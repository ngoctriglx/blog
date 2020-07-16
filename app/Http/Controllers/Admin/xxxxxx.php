<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class xxxxxx extends Controller
{
    public function getAdmin(){
        $username = "bossadmin";
        $pass = bcrypt(123456789);
        $name = "Boss Admin";
        $admin = DB::table('admin')->insert(['username'=>$username,'password'=>$pass,'name'=>$name,'level'=>0]);
    }
}
