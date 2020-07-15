<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'home'], function () {

    Route::get('/home','Home\ShowController@getHome')->name('home.get.home');
    Route::get('/','Home\ShowController@getBlog')->name('home.get.blog');
    Route::get('/{id}/{title}','Home\ShowController@getBlogdetail')->name('home.get.blogdetail');
    
});
Route::group(['prefix' => 'user'], function () {

    Route::get('/login','User\LoginController@getLogin')->name('user.get.login');
    Route::post('/login','User\LoginController@postLogin')->name('user.post.login');
    Route::get('/logout','User\LoginController@getLogout')->name('user.get.logout');

    Route::get('/loginfacebook/{provider}','User\LoginController@getFacebookRedirect')->name('user.get.facebookredirect');
    Route::get('/loginfacebook/{provider}/callback','User\LoginController@getFacebookCallback')->name('user.get.facebookcallback');
    
    Route::get('/logingoogle/{provider}','User\LoginController@getGoogleRedirect')->name('user.get.googleredirect');
    Route::get('/logingoogle/{provider}/callback','User\LoginController@getGoogleCallback')->name('user.get.googlecallback');

    Route::post('/resetpw','User\ResetPassword@postResetPw')->name('user.post.resetpw');
    Route::get('password/reset/{remember_token}','User\ResetPassword@checktoken');
    Route::post('password/newpass',"User\ResetPassword@newPass")->name('user.post.newpass');

    Route::post('/comment','User\CmtController@postComment')->name('user.post.comment');
    Route::post('/replycomment/{cmt_id}','User\CmtController@postReplyComment')->name('user.post.replycomment');

    Route::get('/infouser','User\InfoController@getInfo')->name('user.get.infouser');
    Route::post('/postinfouser','User\InfoController@postInfo')->name('user.post.infouser');
    Route::post('/postrepassword','User\InfoController@postChangepw')->name('user.post.repassword');

    Route::post('/edit/like','User\LikeShareController@postLike')->name('user.get.like');
    
});
Route::group(['prefix' => 'admin'], function () {
    
    Route::get('/','Admin\ShowController@getDashboard')->name('admin.get.dashboard');
    Route::get('/post','Admin\ShowController@getPost')->name('admin.get.post');

    Route::get('/create','Admin\CreateController@getCreate')->name('admin.get.create');
    Route::post('/create','Admin\CreateController@postCreate')->name('admin.post.create');

    Route::get('/add','Admin\PostController@getAdd')->name('admin.get.add');
    Route::post('/postadd','Admin\PostController@postAdd')->name('admin.post.add');

    Route::get('/edit/{id}','Admin\PostController@getEdit')->name('admin.get.edit');
    Route::get('/edit/delete/img/{id}','Admin\PostController@getDeleteimg')->name('admin.get.delete.img');
    Route::post('/postedit/{id}','Admin\PostController@postEdit')->name('admin.post.edit');

    Route::get('/delete/post/{id}','Admin\PostController@getDelete')->name('admin.get.delete');

});