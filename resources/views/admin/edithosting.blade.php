@extends('admin/layout')
@section('title', 'EDIT HOSTING')
@section('noidung')
<div class="container">
    <h2>Edit Hosting</h2>
    <form method="POST" action="{{ route('admin.post_edithosting', ['id' => $hosting->ID]) }}">
        @csrf
        <div class="form-group">
            <label for="nameHosting"><i class="fas fa-server"></i> Hosting Images:</label>
            <input type="file" class="form-control" id="nameHosting" name="img" value="{{ $hosting->img }}" required>
        </div>
        <div class="form-group">
            <label for="nameHosting"><i class="fas fa-server"></i> Hosting Name:</label>
            <input type="text" class="form-control" id="nameHosting" name="name_Hosting" value="{{ $hosting->name }}" required>
        </div>

        <div class="form-group">
            <label for="type"><i class="fas fa-tag"></i> Type:</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $hosting->type }}" required>
        </div>

        <div class="form-group">
            <label for="moTa"><i class="fas fa-info-circle"></i> Description:</label>
            <textarea class="form-control" id="moTa" name="mo_ta" rows="3" required>{{ $hosting->mo_ta }}</textarea>
        </div>

        <div class="form-group">
            <label for="giaTien"><i class="fas fa-dollar-sign"></i> Price:</label>
            <input type="text" class="form-control" id="iaTien" name="GiaTien" value="{{ $hosting->GiaTien }}" required>
        </div>
        
        <div class="form-group">
            <label for="bandwith"><i class="fas fa-database"></i> Data:</label>
            <input type="text" class="form-control" id="bandwith" name="data_Hosting" value="{{ $hosting->data_Hosting }}" required>
        </div>

        <div class="form-group">
            <label for="bandwith"><i class="fas fa-wifi"></i> Bandwidth:</label>
            <input type="text" class="form-control" id="bandwith" name="bandwith" value="{{ $hosting->bandwith }}" required>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update</button>
    </form>
</div>
@endsection


