@extends('admin/layout')
@section('title', 'ADD USER')
@section('noidung')
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-user-plus"></i> Add User
          </div>
          <div class="card-body">
            <form method="POST" action="{{route('post_adduser')}}">
                @csrf
              <div class="form-group">
                <label for="username"><i class="fas fa-user"></i> Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
              </div>
              <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection