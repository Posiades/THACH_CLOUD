@extends('layout/layout')
@section('title', 'LỖI XÁC THỰC')
@section('bodyclass', 'main-layout inner_page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="error-container">
          <h2 class="text-center mb-4">Error</h2>
          <div class="alert alert-danger" role="alert">
            <strong>Error:</strong> THÔNG TIN XÁC THỰC KHÔNG CHÍNH XÁC HOẶC TOKEN ĐÃ HẾT HẠN, VUI LÒNG THỬ LẠI.
          </div>
          <p class="text-center"><a href="{{ route('forgotpass') }}" class="btn btn-primary">Quay lại</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection