@extends('layout/layout')
@section('title', 'VPS')
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
       @foreach ($vps as $vps)
          <div class="col-md-4">
             <div id="ho_co" class="order-box_main" >
                <div class="order-box text_align_center">
                  <img class="mb-5" src="{{$vps->img}}" alt="" width="128px">
                   <h3>{{$vps->name}}</h3>
                   <p> Chỉ từ  <span>{{ number_format($vps->GiaTien, 0) }}</span> /Tháng</p>
                   {{-- <a href="Javascript:void(0)">{{$vps->type}}</a> --}}
                   <ul class="supp">
                    <li><strong>Dung lượng ổ cứng NVME: {{$vps->Storage}} GB</strong></li>
                      @php
                             $lines = explode("\n", $vps->mo_ta);
                      @endphp
                      @foreach($lines as $line)
                      <li><span class="bullet">&#10003; </span> {{$line}}</li>
                      @endforeach
                      <li><strong>Băng Thông:</strong>{{$vps->bandwidth}}MB/S</li>
                   </ul>
                </div>
                <form action="" method="post">
                <a class="read_more" href="{{route('detailvps', [$vps->slug])}}">Đăng Ký</a>
                </form>
             </div>
          </div>
          @endforeach
       </div>
    </div>
 </div>
@endsection