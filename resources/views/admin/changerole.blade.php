@extends('admin/layout')
@section('title', 'Update Role')
@section('noidung')

@if(Session::has('user_search'))
    <div class="alert alert-success">
    {{ Session::get('user_search') }}
</div>
@endif
@if(Session::has('uprole'))
    <div class="alert alert-success">
    {{ Session::get('uprole') }}
</div>
@endif
<div class="container">
    <h1>Update Role User</h1> <br>

    @forelse ($client as $client)
        <table>
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$client->username}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->password}}</td>
                    <td>
                        <form method="POST" action="{{route('post_changerole', ['id'=>$client->id])}}">
                            @csrf
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="fas fa-edit"></i></button>
                    </form>
                    </td> 
                </tr>
            </tbody>
        </table>
    @empty
        <p>Danh sách người dùng cần up quyền trống</p>
    @endforelse
</div>

@endsection