@extends('layout/layout')
@section('title', 'Liên Hệ')
@section('bodyclass', 'main-layout inner_page')
@section('content')
<div class="contact">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>LIÊN HỆ VỚI<span class="blue_light"> CHÚNG TÔI</span></h2>
                  </div>
               </div>
               <div class="col-md-10 offset-md-1">
                  <form id="request" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="HỌ VÀ TÊN" type="type" name=" Name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="SỐ ĐIỆN THOẠI" type="type" name="Phone Number">                          
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="EMAIL" type="type" name="Email">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="NỘI DUNG" type="type" Message="Name"></textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">GỬI NGAY</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
@endsection