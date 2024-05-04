@extends('layout/layout')
@section('title', 'THAY ĐỔI MẬT KHẨU')
@section('bodyclass', 'main-layout inner_page')
@section('content')
@if(Session::has('success_sendmail_resetpass'))
    <div class="alert alert-success">
        {{ Session::get('success_sendmail_resetpass') }}
    </div>
@endif
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Reset Password</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('captcha_fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('captcha_fail') }}
                            </div>
                        @endif

                    <form method="POST" action="{{ route('user.changepass')}}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group captcha">
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                            <div class="g-recaptcha" data-sitekey="6LeyCaQpAAAAAHAUNtmzjy7YN4ASUvop3VfUDigK"></div>
                        </div>
                        <br>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                Gửi Mã Xác Thực
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection