<?php

namespace App\Http\Controllers;

use App\Mail\contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\hosting;
use App\Models\vps;
use App\Models\tickets;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    function index(){
        $hostings = hosting::limit(3)->get();
        $vps = vps::limit(3)->get();
        return view('layout/index', compact('hostings', 'vps'));
    }

    function about(){
        return view('layout/about');
    }

    function hosting(){
        $hostings = hosting::all();
        return view('layout/hosting', compact('hostings'));
    }

    function vps(){
        $vps = vps::all();
        return view('layout/vps', compact('vps'));
    }

    function contract(Request $req){
        return view('layout/contract');
    }

    function post_contract(Request $req){
        $name = $req -> name;
        $phone = $req -> phone;
        $email = $req -> email;
        $content = $req -> content;
        Mail::to('thachnguyenngoc2504@gmail.com')->send(new contract($name, $phone, $email, $content));
        Session::flash('contract', "Đã gửi phản hồi của bạn thành công, xin cảm ơn sự đóng góp của bạn");
        $tickets = new tickets;
        if(Auth::check()){
            $tickets -> id_User = Auth::user()->id;
            $tickets -> phone_number = $phone;
            $tickets -> title = "Phản Hồi Từ Contract";
            $tickets -> mo_ta = $content;
            $tickets->save();
        }else{
            $tickets -> phone_number = $phone;
            $tickets -> title = "Phản Hồi Từ Contract";
            $tickets -> mo_ta = $content;
            $tickets->save();
        }

        return view('layout/contract');
    }
    
    function detail($type,$slug){
        if(Auth::check()){
           if($type == "hosting"){
            $product = hosting::where('slug', $slug)->first();
        }else if($type == "vps"){
            $product = vps::where('slug', $slug)->first();
        }else{
            {{echo "<h1> Lỗi Không Nhận Diện Được Loại Dịch Vụ </h1>";}}
         } 
        }else{
            return view('layout.login');
        }

        return view('layout/detail', compact('product'));
    }

    
}
