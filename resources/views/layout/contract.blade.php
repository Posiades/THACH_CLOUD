@extends('layout/layout')
@section('title', 'LIÊN HỆ')
@section('bodyclass', 'main-layout inner_page')
@section('content')
<div class="contact">
@if(Session::has('contract'))
    <div class="alert alert-success">
    {{ Session::get('contract') }}
</div>
@endif
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>LIÊN HỆ VỚI<span class="blue_light"> CHÚNG TÔI</span></h2>
                  </div>
               </div>
               <div class="col-md-10 offset-md-1">
                  <form method="POST" action="{{route('post_contract')}}" id="request" class="main_form">
                     @csrf
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="HỌ VÀ TÊN" type="type" name="name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="SỐ ĐIỆN THOẠI" type="type" name="phone">                          
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="EMAIL" type="type" name="email">                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="NỘI DUNG" type="type" name="content"></textarea>
                        </div>
                        <div class="col-md-12">
                           <button type="submit" class="send_btn">GỬI NGAY</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
@endsection