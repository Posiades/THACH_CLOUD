@extends('layout/layout')
@section('title', 'Giỏ hàng')
@section('bodyclass', 'main-layout inner_page')
@section('content')

    @if(session()->has('cart'))
    <div class="container mt-5">
        <h2>Sevice Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Date Use</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $key => $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item['name'] }}</td>
                    <td><img src="{{ asset($item['img']) }}" alt="{{ $item['name'] }}" style="max-width: 35px;"></td>
                    <td>
                        <input type="number" class="form-control" value="{{ $item['quantity'] }}" min="1" id="quantity_{{ $key }}">
                    </td>
                    <td>{{ $item['thang'] }} Tháng</td>
                    <td>{{ number_format($item['price'], 0);}} vnđ</td>
                    <td>{{ number_format($item['price'] * $item['quantity'], 0);}} vnđ</td>
                    <td>
                        <form method="GET" action="{{route('removeitem', ['id'=>$item['name']])}}">
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @php 
                $total += $item['price'] * $item['quantity'] * $item['thang'];
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right"><strong>Total:</strong></td>
                                @php 
                            
                        @endphp
                    <td colspan="2">{{ number_format($total, 0) }} VNĐ</td>
                    <td colspan="2">
                        <a class="btn btn-primary btn-lg btn-block" href="{{route('payment_total',['total'=>$total])}}">Thanh toán</a>
                    </td>
                </tr>
            </tfoot>
        </table>
      </div>
      @else
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <h1>Giỏ Hàng Trống</h1>
          </div>
        </div>
      </div>
      @endif
@endsection