<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hosting;
use App\Models\vps;
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

    function contract(){

        return view('layout/contract');
    }
    
    function detail($slug){
        $hostings = hosting::where('slug', $slug)->firstOrFail();
        return view('layout/detail', compact('hostings'));
    }
    
    function detailvps($slug){
        $vps = vps::where('slug', $slug)->firstOrFail();
        return view('layout.detailvps', compact('vps'));
    }

}
