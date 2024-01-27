<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;
use App\Post;



class UsersController extends Controller
{
    //
    public function profile($id){
        // idをもとにUsersテーブルからユーザー情報を取得
        $users = User::where('id',$id)->get();
        // idをもとにPostテーブルからユーザーの投稿を取得
        $posts = Post::where('user_id',$id)->get();
        // dd($posts);
        // dd($users);
        return view('users.profile',['users'=>$users,'posts'=>$posts]);
    }

    public function search(Request $request){
        // Userテーブルからすべてのレコードを取得
        $user=User::query();
        // キーワードから検索処理
        $keyword=$request->input('keyword');
        if(!empty($keyword)){   // $keywordが空では場合
            $user->where('username','LIKE',"%{$keyword}%")->get();
        }
        $post=$user->paginate(5);
        return view('users.search',['post'=>$post,'keyword'=>$keyword]);
    }

    public function profileUpdate(Request $request){
        $validator=Validator::make($request->all(),[
            'username'=>'required|min:2|max:12',
            'email'=>'required|string|email|min:5|max:40',
            'password'=>'required|alpha_num|min:8|max:20|confirmed',
            'password_confirmation'=>'required|alpha_num|min:8|max:20',
            'bio' => 'max:150',
            'images' => 'image',
        ]);


        $id=$request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $images = $request->input('images');
        // 画像をpublic/imagesに保存する
        // dd($request->file('images'));
        if($request->hasFile('images')){
        $file_name=$request->file('images')->getClientOriginalName();
        $image=$request->file('images')->storeAs('public/images',$file_name);
        }else{
            $image=Auth::user()->images;
        }

        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }else{
        \DB::table('users')
        ->where('id', $id)
        ->update([
            'username'=>$request->input('username'),
            'mail'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'bio'=>$request->input('bio'),
            'images'=>basename($image),
        ]);
        return redirect('/top');
    }

    }


}
