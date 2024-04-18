@extends('admin/layout')
@section('title', 'Dashboard')
@section('noidung')
   <div class="container">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <h4>Hiện trên hệ thống có: <strong>{{count($hosting)}}</strong> </h4>
                    <h4>Dịch vụ Hosting</h4>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <h4>Hiện trên hệ thống có: <strong>{{count($vps)}}</strong> </h4>
                    <h4>Dịch vụ VPS</h4>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-12">
                    <h3>Hiện trên hệ thống có: <strong>{{count($user)}}</strong> </h3>
                    <h3>Tài Khoản Người dùng</h3>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection