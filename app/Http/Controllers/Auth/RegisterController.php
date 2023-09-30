<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $validated=$request->validate([
                'username'=>'required|min:2|max:12',
                'mail'=>'required|string|email|min:5|max:40',
                'password'=>'required|alpha_num|min:8|max:20',
                'password_confirmation'=>'required|alpha_num|min:8|max:20|confirmed'
            ]);


            // 入力した値を取得するメソッド
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');


            // 送信後「username」「mail」「password」のデータが格納される
            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            // セッションにてデータを保存する
            $input=$request->session()->put('username',$username);
            return redirect('added')->with($input,'username');
        }
        return view('auth.register');
    }
    public function added(){
        return view('auth.added');
    }
}
