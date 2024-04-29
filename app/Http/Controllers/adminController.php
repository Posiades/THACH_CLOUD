<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\cart;
use App\Models\hosting;
use App\Models\vps;
use App\Models\User;
use App\Models\tickets;
use Illuminate\Auth\Events\Validated;

class adminController extends Controller
{
    function dashboard(){
        $hosting = hosting::all();
        $vps = vps::all();
        $user = user::where('is_admin', 0)->get();
        $tickets = tickets::all();
        return view('admin/index', compact('hosting', 'vps', 'user', 'tickets'));      
    }
    
    function listhosting(){
        $hosting = Hosting::all();
        return view('admin/listhosting', compact('hosting'));
    }
    
    function add_service($type){
        if($type == "hosting"){
            $product = "hosting";
        }else if($type == "vps"){
            $product = "vps";
        }else{
            {{echo "<h1> Lỗi Không Xác Định Được Loại Service </h1>";}}
        }
        return view('admin.add_service', compact('product'));
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
    

    function edit_service($type, $id){
        if($type == "hosting"){
            $product = hosting::findOrFail($id);
        } else if($type == "vps"){
            $product = vps::findOrFail($id);
        } else{
            {{ echo "<h1> Lỗi Không Nhận Diện Được Dịch Vụ</h1>"; }}
        }
        return view('admin/edit_service', compact('product'));
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

    function confirm($type, $id){
        if($type == "hosting"){
            $product = hosting::findOrFail($id);
        }else if($type == "vps"){
            $product = vps::findOrFail($id);
        } else if($type == "user"){
            $product = user::findOrFail($id);
        }
         else{
            {{echo "<h1> Lỗi Không Nhận Diện Được Loại Dịch Vụ </h1>";}}
        }

        return view('admin/confirm', compact('product'));
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

        return redirect()->route('admin.listvps');
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



    // user controller

    function listclient(){
        $client = user::where('is_admin', '0')->get();
        return view('admin/listclient', compact('client'));

    }

    function adduser(){
        return view('admin.adduser');
    }

    function post_adduser(Request $req){
        $passwordHashed = Hash::make($req->password);
        user::create([
            'username' => $req->username,
            'email' => $req->email,
            'password' => $passwordHashed,
        ]);

        Session::flash('adduser', "Đã thêm Người Dùng '$req->username' thành công");

        return redirect()->route('listclient');
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

    function deleteuser($id){
        $user = user::findOrFail($id);
        DB::table('users')
        ->where('id', $id)
        ->delete();

        Session::flash('deleteuser', "Đã Xóa Người Dùng '$user->username' thành công");

        return redirect()->route('listclient');
    }

    function changeroleuser(){
        $client = user::where('is_admin', 0)->get();
        return view('admin/changerole', compact('client'));
    }

    function post_changerole(Request $req, $id){
        $client = user::findOrFail($id);
        DB::table('users')
        -> where('id', $id)
        -> update([
            'is_admin' => 1
        ]);

        Session::flash('uprole', "Đã Update role '$client->username' thành công và có quyền truy cập admin");
        return redirect()->route('changeroleuser');
    }


    // GUI function  

    function change_logo(){
        return view('admin.change_logo');
    }

    function post_change_logo(Request $req){

        $image = $req->fileimg;
        $name_file = $_FILES["fileimg"]["name"];
        $file_extension = pathinfo($name_file, PATHINFO_EXTENSION);

        $targetDir = public_path('images/');
        $name_file_convert = 'logo'. '.' .$file_extension;
        $targetFile = $targetDir . basename($name_file_convert);
        $uploadOk = 1;

        if(isset($image)) {
            $check = getimagesize($_FILES["fileimg"]["tmp_name"]);
            if($check !== false) {
                $messes = "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $messes = "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        if ($_FILES["fileimg"]["size"] > 500000) {
            $messes = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        if($file_extension != "png" ) {
            $messes = "Sorry, only PNG files are allowed.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            $messes = "Sorry, your file was not uploaded or not input.";
        } else {
            if (move_uploaded_file($_FILES["fileimg"]["tmp_name"], $targetFile)) {
               
                $messes = "The file ". basename( $_FILES["fileimg"]["name"]). " has been uploaded.";
            } else {
                $messes = "Sorry, there was an error uploading your file.";
            }
        }

        return view('admin.change_logo', compact('messes'));
    }

    function change_footer(){
        return view('admin.change_footer');
    }

    




}
