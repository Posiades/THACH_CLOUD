@extends('admin/layout')
@section('title', 'Sửa Thông Tin Người Dùng')
@section('noidung')
    <div class="container">
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="editUsername" name="username" value="{{$user->username}}">
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="editEmail" name="email" value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="editPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="editPassword" name="password" value="{{$user->password}}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
            </div>
        </div>
    </div>
</div>

    </div>
@endsection