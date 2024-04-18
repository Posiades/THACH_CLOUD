@extends('admin/layout')
@section('title', 'Update Role')
@section('noidung')

@if(Session::has('user_search'))
    <div class="alert alert-success">
    {{ Session::get('user_search') }}
</div>
@endif


<div class="container">
    <h1>Update Role User</h1> <br>
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
                <td>{{$user->username}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->username}}</td>
                <td>
                    <a href="{{route('edituser', ['id'=>$client['id']])}}" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="fas fa-edit"></i></a>
                    <a href="{{route('admin.confirm', ['type'=>'user', 'id'=>$client['id']])}}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
      
        </tbody>
    </table>
</div>

@endsection