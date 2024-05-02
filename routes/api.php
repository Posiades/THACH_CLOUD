<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\hosting;
use App\Models\vps;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/apihosting', function(){
    $hosting = hosting::get();
    return response()->json(['data' => $hosting]);
});

Route::get('/apivps', function(){
    $vps = vps::get();
    return response()->json(['data' => $vps]);
});

Route::get('/apiindex', function(){
    $hosting = hosting::get();
    $vps = vps::get();
    return response()->json(['data'=> $hosting, 'data2'=>$vps]);
});

