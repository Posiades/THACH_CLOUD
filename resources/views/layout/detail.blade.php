@extends('layout/layout')
@section('title', 'Detail')
@section('bodyclass', 'main-layout inner_page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="titlepage text_align_center">
                     <h2>GIA HẠN<span class="blue_light"> HOSTING</span></h2>
                  </div>
            </div>
        </div>
    </div>

<div class="container">
        <div class="grid-container">
            <div class="info-column">
                <div class="hosting-info">
                    <h2>{{$hostings->name}}</h2><hr>
                    <ul class="supp">
                        <li><strong>Dung Lượng: {{$hostings->data_Hosting}} GB NVME</strong></li>
                           @php
                                  $lines = explode("\n", $hostings->mo_ta);
                           @endphp
                           @foreach($lines as $line)
                           <li><span class="bullet">&#10003; </span> {{$line}}</li>
                           @endforeach
                           <li><strong>Băng Thông: </strong>{{$hostings->bandwith}}MB/S</li>
                        </ul>
                </div>
            </div>
            @php 
                $price = number_format($hostings->GiaTien, 0);
            @endphp
            <input id="price" type="hidden" value="{{$price}}">
            <div class="options-column">
                <div class="subscription-options">
                    <h2>Lựa chọn thời hạn:</h2><hr>
                    <div class="option">
                        <input type="radio" name="duration" value="1" data-price="10" id="thang1" onclick="month1()" checked>
                        <label>1 Tháng</label>
                    </div>
                    <div class="option">
                        <input type="radio" name="duration" value="3" data-price="25" id="thang3" onclick="month3()">
                        <label>3 Tháng</label>
                    </div>
                    <div class="option">
                        <input type="radio" name="duration" value="6" data-price="50" id="thang6" onclick="month6()">
                        <label>6 Tháng (giảm 5%)</label>
                    </div>
                    <div class="option">
                        <input type="radio" name="duration" value="12" data-price="100" id="thang12" onclick="month12()">
                        <label>12 Tháng (giảm 10%)</label>
                    </div>
                    <div class="option">
                        <input type="radio" name="duration" value="24" data-price="200" id="thang24" onclick="month24()">
                        <label>24 Tháng (giảm 20%)</label>
                    </div>
                </div>
            </div>

            <div class="total-column">
                <div class="total-price">
                    <h2>Tổng thanh toán:</h2><hr>
                    <h3 id="total"></h3>
                </div>
                    <br> <br>
                    <form method="POST" action="{{ route('payment_vnpay',['type'=>$hostings->type_product]) }}">
                        @csrf
                        <input type="hidden" id="totalpay" name="totalpay" value="">
                        <button type="submit" class="read_more read_more_button">Thanh Toán</button>
                    </form>
                    <br>
                    <form method="POST" action="{{ route('addcart', [ 'type'=>$hostings->type_product, 'id' => $hostings->ID]) }}">
                        @csrf
                        <input type="hidden" id="dateuse" name="dateuse" value="">
                        <button type="submit" class="read_more read_more_button">TIẾP TỤC MUA HÀNG</button>
                    </form>
            </div>
        </div>
    </div>
    <script>
        const price = document.getElementById('price');
        const tien = parseFloat(price.value);
        const valueForm = document.getElementById('dateuse');
        const totalpay = document.getElementById('totalpay')

        month1 = () =>{
          var month1  = document.getElementById('thang1');
          var thang1 = parseFloat(month1.value);
          var tongtien = tien * thang1;
          var tienvnd = tongtien.toLocaleString('vi-VN');
           var tong = document.getElementById('total');
            tong.innerHTML= tienvnd+".000 VNĐ"
            valueForm.value = thang1
            totalpay.value = tongtien
        }
        month3 = () =>{
          var month3  = document.getElementById('thang3');
          var thang3 = parseFloat(month3.value);
          var tongtien = tien * thang3;
          var tienvnd = tongtien.toLocaleString('vi-VN');
            var tong = document.getElementById('total');
            tong.innerHTML= tienvnd+".000 VNĐ"
            valueForm.value = thang3
            totalpay.value = tongtien
        }
        month6 = () =>{
          var month6  = document.getElementById('thang6');
          var thang6 = parseFloat(month6.value);
          var tongtien = (tien * thang6)*0.95;
          var tienvnd = tongtien.toLocaleString('vi-VN');
            var tong = document.getElementById('total');
            tong.innerHTML= tienvnd+".000 VNĐ"
            valueForm.value = thang6
            totalpay.value = tongtien
        }
        month12 = () =>{
          var month12  = document.getElementById('thang12');
          var thang12 = parseFloat(month12.value);
          var tongtien = (tien * thang12)*0.9;
          var tienvnd = tongtien.toLocaleString('vi-VN');
            var tong = document.getElementById('total');
            tong.innerHTML= tienvnd+".000 VNĐ"
            valueForm.value = thang12
            totalpay.value = tongtien
        }
        month24 = () =>{
          var month24  = document.getElementById('thang24');
          var thang24 = parseFloat(month24.value);
          var tongtien = (tien * thang24)*0.8;
          var tienvnd = tongtien.toLocaleString('vi-VN');
            var tong = document.getElementById('total');
            tong.innerHTML= tienvnd+".000 VNĐ"
            valueForm.value = thang24
            totalpay.value = tongtien
        }
        document.addEventListener('DOMContentLoaded', function() {
            month1();
        });


        
        document.addEventListener('DOMContentLoaded', function() {
        const checkoutBtn = document.getElementById('checkoutBtn');

        checkoutBtn.addEventListener('click', function() {
            // Redirect to appropriate page based on authentication status
            window.location.href = "{{ Auth::check() ? '/' : '/login' }}";
        });
    });



    </script>
@endsection