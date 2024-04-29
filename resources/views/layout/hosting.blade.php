@extends('layout/layout')
@section('title', 'HOSTING')
@section('bodyclass', 'main-layout inner_page hosting_page')
@section('content')
<div class="order">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="titlepage text_align_center">
                     <h2>KHÁM PHÁ CÁC GÓI DỊCH VỤ TUYỆT VỜI TẠI THACH CLOUD <br> <br> <span class="blue_light">ĐĂNG KÝ NGAY</span></h2>
                     <p> <strong>THACH CLOUD</strong> cam kết mang đến cho bạn dịch vụ cloud hosting uy tín, chất lượng, giá cả tốt nhất thị trường. Ngoài ra, sản phẩm của chúng tôi còn mang đến cho bạn
                        không những tuyệt vời mà còn an toàn và bảo mật.
                     </p>
                  </div>
               </div>
            </div>
            <div class="row">
            @foreach ($hostings as $hosting)
               <div class="col-md-4">
                  <div id="ho_co" class="order-box_main" >
                     <div class="order-box text_align_center height_hosting">
                        <img class="mb-5" src="{{{$hosting->img}}}" alt="" width="128px"><br>
                        <h3>{{$hosting->name}}</h3>
                        <p> Chỉ từ  <span>{{ number_format($hosting->GiaTien, 0) }}</span> /Tháng</p>
                        <a href="Javascript:void(0)">{{$hosting->type}}</a>
                        <ul class="supp">
                        <li><strong>Dung Lượng: {{$hosting->data_Hosting}} GB NVME</strong></li>
                           @php
                                  $lines = explode("\n", $hosting->mo_ta);
                           @endphp
                           @foreach($lines as $line)
                           <li><span class="bullet">&#10003; </span> {{$line}}</li>
                           @endforeach
                           <li><strong>Băng Thông: </strong>{{$hosting->bandwidth}}MB/S</li>
                        </ul>
                     </div>
                     <form action="" method="post">
                     <a class="read_more" href="{{route('detail',['type'=>$hosting->type_product , 'slug'=>$hosting->slug])}}">Đăng Ký</a>
                     </form>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
@endsection