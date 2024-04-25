@extends('admin/layout')
@section('title', 'Thay Đổi Logo Website')
@section('noidung')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Upload Image</div>
                <div class="card-body">
                    <form action="{{route('post_change_logo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="fileToUpload">Select image to upload:</label>
                            <input type="file" class="form-control-file" name="fileimg" id="fileToUpload">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Upload Image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        @if (isset($messes))
            <h1>{{ $messes }}</h1>
        @endif
    </div>
</div>
@endsection