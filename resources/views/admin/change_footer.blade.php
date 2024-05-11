@extends('admin/layout')
@section('title', 'Thay Đổi Footer Website')
@section('noidung')
<div class="container">
    <h2>CHANGE FOOTER</h2>
    <form method="POST" action="{{route('post_changefooter')}}">
        @csrf
      <div class="form-group">
        <label for="input1">Input 1:</label>
        <textarea class="form-control" name="col1" id="input1" placeholder="Nhập chỉ mục cho cột 1 Footer, kết thúc mỗi giá trị bằng Enter"></textarea>
      </div>
      <div class="form-group">
        <label for="input2">Input 2:</label>
        <textarea class="form-control" name="col2" id="input2" placeholder="Nhập chỉ mục cho cột 2 Footer, kết thúc mỗi giá trị bằng Enter"></textarea>
      </div>
      <div class="form-group">
        <label for="input3">Input 3:</label>
        <textarea class="form-control" name="col3" id="input3" placeholder="Nhập chỉ mục cho cột 3 Footer, kết thúc mỗi giá trị bằng Enter"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Thay Đổi</button> <br>
      <button type="submit" name="default" value="0" class="btn btn-primary mt-4">Footer Mặc Đinh</button>

    </form>
  </div>


@endsection