<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class PostsController extends Controller
{

    // 投稿の表示
    public function index(){
        // Postテーブルからレコード情報を取得
        // $list=Post::get();
        $list=Post::query()->whereIn('user_id',Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id',Auth::user()->id)->latest()->get();
        // bladeへ返す際にデータを送る
        return view('posts.index',['list'=>$list]);
        // return view('posts.index',['list'=>$list,'user_id'=>$user_id]);
    }

    // 投稿の登録処理
    public function postCreate(Request $request){
        // 投稿フォームに書かれた投稿を受け取る
        $post=$request->input('newPost');
        $user_id=Auth::user()->id;
        // dd($user_id);
        // 投稿の登録
        // Postテーブルの'user_id','post'に変数を当てはめる
        Post::create([
            'user_id'=>$user_id,
            'post'=>$post
        ]);
        return redirect('/top');
    }

    // 投稿の編集処理
    public function update(Request $request){
        $id=$request->input('id');
        $up_post=$request->input('upPost');

        Post::where('id',$id)->update(['post'=>$up_post]);

        return redirect('/top');
    }

    // 投稿の削除機能
    public function delete($id){
        Post::where('id',$id)->delete();

        return redirect('/top');
    }
    // public function index(){
    //     $posts=Post::query()->whereIn('user_id',Auth::user()->follows()->pluck('followed_id'))->latest()->get();
    //     return view('posts.index');
    // }

}
