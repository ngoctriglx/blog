<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function getDashboard(){
        return view('admin.dashboard');
    }
    public function getPost(){
        $post = DB::table('post')->orderBy('updated_at','desc')->get();
        return view('admin.post',['post'=>$post]);
    }
}
