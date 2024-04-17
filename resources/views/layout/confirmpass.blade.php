@extends('layout/layout')
@section('title', 'THAY ĐỔI MẬT KHẨU MỚI')
@section('bodyclass', 'main-layout inner_page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="password-reset-form">
          <h2 class="text-center mb-4">Reset Password</h2>
          <form method="POST" action="{{ route('user.confirmpass', ['email'=>$email]) }}">
            @csrf
            <div class="form-group">
              <label for="newPassword">New Password</label>
              <input type="password" name="password" class="form-control" id="newPassword" placeholder="Enter new password">
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" name="re_password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection