<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;


class UsersController extends Controller
{
    //
    public function profile(){
        $users = User::where('id',Auth::user()->id)->get();
        // dd($users);
        return view('users.profile',['users'=>$users]);
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

        $user=Auth::user();
        // 画像をpublic/imagesに保存する
        dd($request->input('images'));
        $file_name=$request->file('images')->getClientOriginalName();
        $image=$request->file('images')->store('public/images',$file_name);
        $validator->validate();
        $user->update([
            'username'=>$request->input('username'),
            'mail'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'bio'=>$request->input('bio'),
            'images'=>basename($image)
        ]);

        return redirect('/top');
    }
}
