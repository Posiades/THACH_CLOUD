@extends('admin/layout')
@section('title', 'Danh Sách Người Dùng')
@section('noidung')
<div class="container">
    <h1>User Management</h1> <br>
    <form method="POST" action="{{route('searchuser')}}" >
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search users" name="searchquery">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form> <br>
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fas fa-plus"></i> Add User</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userrespon as $user): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="{{route('listclient')}}" class="btn btn-primary">Back</a>
</div>
@endsection