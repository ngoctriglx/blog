<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post,App\Imgpost,DB;

class PostController extends Controller
{
    
    public function getAdd(){
        return view('admin.postCtrl.add');
    }
    public function getDetail(){
        return view('admin.postCtrl.detail');
    }
    public function getEdit($id){
        $post = DB::table('post')->where('id',$id)->first();
        return view('admin.postCtrl.edit',['post'=>$post]);
    }

    public function postAdd(Request $request){
        $title = $request->title;
        $subtitle = $request->subtitle;
        $author = $request->author;
        $place = $request->place;
        $content = $request->content;

        $post = new Post;
        $post['title'] = $title;
        $post['sub_title'] = $subtitle;
        $post['author'] = $author;
        $post['place'] = $place;
        $post['content'] = $content;
        $post->save();

        $post_id = $post->id;

        $images = $request->file('images');
        foreach ($images as $key => $image) {
            $extension = $image->getClientOriginalExtension();
            $name = $post_id.Str::random(30).'.'.$extension;
            $image->move(public_path().'/uploads/imgpost/', $name);
            $imgpost = new Imgpost;
            $imgpost['post_id'] = $post_id;
            $imgpost['link_img'] = $name;
            $imgpost->save();
        }
        return back()->with('error','Thêm bài viết thành công !');
    }

    public function postEdit(Request $request, $id){
        $title = $request->title;
        $subtitle = $request->subtitle;
        $author = $request->author;
        $place = $request->place;
        $content = $request->content;

        $post = Post::find($id);
        $post['title'] = $title;
        $post['sub_title'] = $subtitle;
        $post['author'] = $author;
        $post['place'] = $place;
        $post['content'] = $content;
        $post->save();

        $post_id = $post->id;

        $images = $request->file('images');
        foreach ($images as $key => $image) {
            $extension = $image->getClientOriginalExtension();
            $name = $post_id.Str::random(30).'.'.$extension;
            $image->move(public_path().'/uploads/imgpost/', $name);
            $imgpost = new Imgpost;
            $imgpost['post_id'] = $post_id;
            $imgpost['link_img'] = $name;
            $imgpost->save();
        }
        return back()->with('error','Thêm bài viết thành công !');  
    }
}
