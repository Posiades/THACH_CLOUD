<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\cart;
use App\Models\hosting;
use App\Models\vps;
use App\Models\User;

class adminController extends Controller
{
    function dashboard(){
        return view('admin/index');
    }


    function listhosting(){
        $hosting = Hosting::all();
        return view('admin/listhosting', compact('hosting'));
    }
    
    function addhosting(){
        return view('admin/addhosting');
    }

    function post_addhosting(Request $req){
        
        $slug = $req -> namehosting;
        $slug = preg_replace('/[^a-zA-Z0-9\s]/', '', $slug);
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
        $slug = str_replace(' ', '-', $slug);
        
        $img = $req->img;
        $image = "imgupload/$img";
        $binaryImage = $image;

        $hosting = new hosting;
        $hosting->img = $binaryImage;
        $hosting->name = $req->namehosting;
        $hosting->type = $req->type;
        $hosting->mo_ta = $req->mota;
        $hosting->GiaTien = $req->giatien;
        $hosting->data_Hosting = $req->datahosting;
        $hosting->bandwidth = $req->bandwidth;
        $hosting->slug = strtolower($slug);
        $hosting->save();

        Session::flash('success_add', "Đã tạo mới Hosting '$req->namehosting' thành công !");
        return redirect()->route('admin.listhosting');
    }
    

    function edithosting($id){
        $hosting = Hosting::findOrFail($id);
        return view('admin/edithosting', compact('hosting'));
    }
    
    function post_edithosting(Request $req, $id){
        $data = $req->except(['_token']);
        
        $slug = $data['name_Hosting'];
        $slug = preg_replace('/[^a-zA-Z0-9\s]/', '', $slug);
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
        $slug = str_replace(' ', '-', $slug);

        $img = $req->img;
        $image = "imgupload/$img";
        $binaryImage = $image;

        dd($binaryImage);


            DB::table('hosting')
            ->where('ID', $id)
            ->update([
            'img' => $binaryImage,
            'name' => $data['name_Hosting'],
            'type' => $data['type'],
            'mo_ta' => $data['mo_ta'],
            'GiaTien' => $data['GiaTien'],
            'data_Hosting' => $data['bandwith'],
            'slug'=> $slug

            ]);

            Session::flash('success_edit', "Đã update '$req->name_Hosting' thành công");

        return redirect()->route('admin.listhosting');
    }

    function confirm($id){
        $idkc = $id;
        return view('admin/confirm', compact('idkc'));
    }

    function delete_hosting(Request $req, $id){
        DB::table('hosting')
        ->where('ID', $id)
        ->delete();
        Session::flash('success_delete', "xóa Hosting có '$id thành công");
        return redirect()->route('admin.listhosting');
    }


    // ============== FUNCTIONNAL VPS ===========

    function listvps(){
        $vps = vps::all();
        return view('admin/listvps', compact('vps'));
    }

    function addvps(){
        return view('admin/addvps');
    }

    function post_addvps(Request $req){
        $slug = $req -> namevps;
        $slug = preg_replace('/[^a-zA-Z0-9\s]/', '', $slug);
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
        $slug = str_replace(' ', '-', $slug);
        
        $img = $req->img;
        $image = "imgupload/$img";
        $binaryImage = $image;


        $vps = new vps;
        $vps->img = $binaryImage;
        $vps->name = $req->namevps;
        $vps->mo_ta = $req->mota;
        $vps->GiaTien = $req->giatien;
        $vps->Storage = $req->storage;
        $vps->bandwidth = $req->bandwidth;
        $vps->slug = $slug;
        $vps->save();

        Session::flash('addvps', "Đã tạo mới VPS '$req->namevps' thành công !");

        return redirect()->route('admin.listvps');
    }

    function edit_vps($id){
        $vps = vps::findOrFail($id);
        return view('admin/editvps', compact('vps'));
    }

    function post_editvps(Request $req, $id){
        $data = $req->except(['_token']);
        $slug = $req -> namevps;
        $slug = preg_replace('/[^a-zA-Z0-9\s]/', '', $slug);
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
        $slug = str_replace(' ', '-', $slug);

        $img = $req->img;
        $image = "imgupload/$img";
        $binaryImage = $image;

            DB::table('vps')
            ->where('ID', $id)
            ->update([
            'img' => $binaryImage,
            'name' => $data['namevps'],
            'mo_ta' => $data['mo_ta'],
            'GiaTien' => $data['GiaTien'],
            'Storage' => $data['Storage'],
            'bandwidth' => $data['bandwidth'],
            'slug' => $slug

            ]);

            Session::flash('editvps', "Đã update VPS '$req->namevps' thành công");

        return redirect()->route('listvps');
    }

    function delete_vps(Request $req, $id){
        $vpsname = vps::findOrFail($id);
        DB::table('vps')
        ->where('ID', $id)
        ->delete();

        Session::flash('deletevps', "Dẫ xóa VPS '$vpsname->name_Vps' thành công");

        return redirect()->route('admin.listvps');
    }

    function confirm_vps($id){
        $vps = vps::findOrFail($id);
        return view('admin/confirmvps', compact('vps'));
    }

    
    function showcart(){
        $cart = cart::all();
        return view('layout/showcart', compact('cart'));
    }


    // user controller

    function listclient(){
        $client = user::where('is_admin', '0')->get();
        return view('admin/listclient', compact('client'));
    }
    
    function edituser($id){
        $user = user::findOrFail($id);
        return view('admin/edit_user', compact('user'));
    }

    function searchuser(Request $req){
        $user_search = $req -> searchquery;
        $find_username = user::where('is_admin', '0')->where('username', "$user_search")->first();
        $find_email = user::where('is_admin', '0')->where('email', "$user_search")->first();
        if(isset($find_email) || isset($find_username)){
            if(isset($find_email)){
                $user_respon = $find_email;
            }else if(isset($find_username)){
                $user_respon = $find_username;
            }else{
                Session::flash('user_search', "Không tìm Thấy '$user_search' trên hệ thống");
            }
        }else{
            dd('Giá trị trống hoặc không hợp lệ');
        }
        return view('admin.searchuser', compact('user_respon'));
    }





}
