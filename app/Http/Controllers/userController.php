<?php

namespace App\Http\Controllers;

use App\Mail\changePass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\cart;
use App\Models\User;
use Database\Seeders\user as SeedersUser;

class userController extends Controller
{
    function login(){
        return view('layout/login');
    }

    function register(){
        return view('layout/register');
    }
    
    function post_register(Request $req){
        $passwordHashed = Hash::make($req->password); 
           user::create([
               'username' => $req->username,
               'email' => $req->email,
               'password' => $passwordHashed,
           ]);
        
        return redirect()->route('login');
    }
    
    function post_login(Request $req) {
        if (Auth::attempt($req->only('email', 'password'))) {
            if (Auth::user()->is_admin == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect()->back()->with('err', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    function forgotpass(){
        return view('layout/forgotpass');
    }
    
    function post_mailconfirm(Request $req){
            $stringmail = $req -> email;
            $email = explode("@", $stringmail)[0];
            $token = openssl_random_pseudo_bytes(32);
            $hashedToken = hash('sha256', $token);
            session()->put($email, $hashedToken, 60*5);
            Mail::to($stringmail)->send(new changePass($hashedToken, $email));
            Session::flash('success_sendmail_resetpass', "Đã gửi mail đến $stringmail vui lòng check mail để thay đổi mật khẩu");
            return redirect()->back()->with('message', 'Email xác nhận đã được gửi.'); 
     }

     function passreset($token, $email){
        $token_mail = session()->get($email);
        if($token = $token_mail){
            return view('layout/confirmpass', compact('email'));
        }else{
            return view('layout/errorpass');
        }
    }
      
    function post_confirmpass(Request $req, $email){
        $password = $req -> password;
        $re_password = $req -> re_password;
        if($password == $re_password){
            DB::table('users')
        ->where('email', $email)
        ->update([
            'password' =>  Hash::make($password)
        ]);
        }else{
                
        }

        Session::flash('success_resetpass', "Đã Thay Đổi Mật Khẩu Thành Công");
        return redirect()->route('login');
        }
    

    
    
    


}
