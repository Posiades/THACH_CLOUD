@extends('admin/layout')
@section('title', 'Dashboard')
@section('noidung')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dịch vụ Hosting</h4>
                    <p class="card-text">Hiện trên hệ thống có: <strong>{{count($hosting)}}</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dịch vụ VPS</h4>
                    <p class="card-text">Hiện trên hệ thống có: <strong>{{count($vps)}}</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tài Khoản Người Dùng</h4>
                    <p class="card-text">Hiện trên hệ thống có: <strong>{{count($user)}}</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection