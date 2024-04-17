@extends('admin/layout')
@section('title', 'EDIT VPS')
@section('noidung')
<div class="container">
    <h2>Edit VPS</h2>
    <form method="POST" action="{{ route('admin.post_editvps', ['id' => $vps->ID]) }}">
        @csrf
        <div class="form-group">
            <label for="nameHosting"><i class="fas fa-server"></i> VPS Name:</label>
            <input type="text" class="form-control" id="namevps" name="namevps" value="{{ $vps->name_Vps }}" required>
        </div>

        <div class="form-group">
            <label for="moTa"><i class="fas fa-info-circle"></i> Description:</label>
            <textarea class="form-control" id="moTa" name="mo_ta" rows="3" required>{{ $vps->mo_ta }}</textarea>
        </div>

        <div class="form-group">
            <label for="giaTien"><i class="fas fa-dollar-sign"></i> Price:</label>
            <input type="text" class="form-control" id="giaTien" name="GiaTien" value="{{ $vps->GiaTien }}" required>
        </div>
        
        <div class="form-group">
            <label for="bandwith"><i class="fas fa-database"></i> Data:</label>
            <input type="text" class="form-control" id="storage" name="Storage" value="{{ $vps->Storage }}" required>
        </div>

        <div class="form-group">
            <label for="bandwith"><i class="fas fa-wifi"></i> Bandwidth:</label>
            <input type="text" class="form-control" id="bandwith" name="bandwidth" value="{{ $vps->bandwidth }}" required>
        </div>

        <div class="form-group">
            <label for="slug"><i class="fas fa-link"></i> Slug:</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $vps->slug }}" required>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update</button>
    </form>
</div>
@endsection


