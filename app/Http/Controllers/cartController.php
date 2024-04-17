<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hosting;
use App\Models\vps;
use Illuminate\Support\Facades\Session;

use App\Models\cart;

class cartController extends Controller
{
    

    function showcart(){
         $cart = Session()->get('cart');
        return view('layout/showcart', compact('cart'));
    }


    function add_cart(Request $req, $type, $id){
        if(isset($type)){
            if($type === "hosting"){
                $product = hosting::findOrFail($id);
            }
            else if($type === "vps"){
                $product = vps::findOrFail($id);
            }else{
                dd('Không có type sản phẩm phù hợp');
            }
        }else{
            dd("Không đúng $type với hệ thống");
        }

        $cart = session()->get('cart', [], 60);
        if(session()->has('cart')){
            $cart = session()->get('cart');
            if(isset($cart[$product->name])){
                $cart[$product->name]['quantity'] += 1;  
            } else {
                $cart[$product->name] = [
                    'id' => $product->ID,
                    'name' => $product->name,
                    'img' => $product->img,
                    'quantity' => 1,
                    'thang' => $req -> dateuse,
                    'price' => $product->GiaTien
                ];
            }
        } else {
            $cart[$product->name] = [
                'id' => $product->ID,
                'name' => $product->name,
                'img' => $product->img,
                'quantity' => 1,
                'thang' => $req->dateuse,
                'price' => $product->GiaTien
            ];
        }
    
        session()->put('cart', $cart);

        return view('layout.showcart', compact('cart'));
    }

    function removeitem($name){
        $cart = session()->get('cart');     
        if(isset($cart[$name])){
            unset($cart[$name]);
            session()->put('cart', $cart);
        }else{
            return redirect()->route('showcart'); 
        }
       return view('layout.showcart', compact('cart'));
    }

















    function payment_vpn(Request $req, $type){
        if(isset($type)){
            if($type === "hosting"){
                $total = $req->totalpay * 1000;
            }
            else if($type === "vps"){
                $total = $req->totalpay;
            }else{
                dd('Không có type sản phẩm phù hợp');
            }
        }else{
            dd("Không đúng $type với hệ thống");
        }
        $code_bill = rand(123456, 999999);
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
    $vnp_TmnCode = "6IMC1QT0";
    $vnp_HashSecret = "VTMGFIRWAAUMWMQKYAUISPMOZVUYTZAG";
    
    $vnp_TxnRef = 'THACH_CLOUD_PAYMENT_'.$code_bill;
    $vnp_OrderInfo = "Thanh toán";
    $vnp_OrderType = "Payment";
    $vnp_Amount = $total  * 100;
    $vnp_Locale = "VN";
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        return redirect($vnp_Url);
    }


    function payment_total(Request $req, $total){
    $code_bill = rand(123456, 999999);
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
    $vnp_TmnCode = "6IMC1QT0";
    $vnp_HashSecret = "VTMGFIRWAAUMWMQKYAUISPMOZVUYTZAG";
    
    $vnp_TxnRef = 'THACH_CLOUD_PAYMENT_'.$code_bill;
    $vnp_OrderInfo = 'Thanh Toán Hóa Đơn';
    $vnp_OrderType = "Payment";
    $vnp_Amount = $total * 100;
    $vnp_Locale = "VN";
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        return redirect($vnp_Url);
    }








}