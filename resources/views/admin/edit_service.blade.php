@extends('admin/layout')
@section('title', 'EDIT HOSTING')
@section('noidung')
    @if ($product->type_product == "hosting")
    <div class="container">
        <h2>Edit Hosting</h2>
        <form method="POST" action="{{ route('admin.post_edithosting', ['id' => $product->ID]) }}">
            @csrf
            <div class="form-group">
                <label for="nameHosting"><i class="fas fa-server"></i> Hosting Images:</label>
                <input type="file" class="form-control" id="nameHosting" name="img" value="{{ $product->img }}" required>
            </div>
            <div class="form-group">
                <label for="nameHosting"><i class="fas fa-server"></i> Hosting Name:</label>
                <input type="text" class="form-control" id="nameHosting" name="name_Hosting" value="{{ $product->name }}" required>
            </div>
    
            <div class="form-group">
                <label for="type"><i class="fas fa-tag"></i> Type:</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $product->type }}" required>
            </div>
    
            <div class="form-group">
                <label for="moTa"><i class="fas fa-info-circle"></i> Description:</label>
                <textarea class="form-control" id="moTa" name="mo_ta" rows="3" required>{{ $product->mo_ta }}</textarea>
            </div>
    
            <div class="form-group">
                <label for="giaTien"><i class="fas fa-dollar-sign"></i> Price:</label>
                <input type="text" class="form-control" id="iaTien" name="GiaTien" value="{{ $product->GiaTien }}" required>
            </div>
            
            <div class="form-group">
                <label for="bandwith"><i class="fas fa-database"></i> Data:</label>
                <input type="text" class="form-control" id="bandwith" name="data_Hosting" value="{{ $product->data_Hosting }}" required>
            </div>
    
            <div class="form-group">
                <label for="bandwith"><i class="fas fa-wifi"></i> Bandwidth:</label>
                <input type="text" class="form-control" id="bandwith" name="bandwith" value="{{ $product->bandwidth }}" required>
            </div>
    
            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update</button>
        </form>
    </div>
        @elseif ($product->type_product == "vps")
        <div class="container">
            <h2>Edit VPS</h2>
            <form method="POST" action="{{ route('admin.post_editvps', ['type'=>$product->type_product, 'id' => $product->ID]) }}">
                @csrf
                <div class="form-group">
                    <label for="nameHosting"><i class="fas fa-server"></i> VPS Name:</label>
                    <input type="text" class="form-control" id="namevps" name="namevps" value="{{ $product->name }}" required>
                </div>
        
                <div class="form-group">
                    <label for="moTa"><i class="fas fa-info-circle"></i> Description:</label>
                    <textarea class="form-control" id="moTa" name="mo_ta" rows="3" required>{{$product->mo_ta }}</textarea>
                </div>
        
                <div class="form-group">
                    <label for="giaTien"><i class="fas fa-dollar-sign"></i> Price:</label>
                    <input type="text" class="form-control" id="giaTien" name="GiaTien" value="{{ $product->GiaTien }}" required>
                </div>
                
                <div class="form-group">
                    <label for="bandwith"><i class="fas fa-database"></i> Data:</label>
                    <input type="text" class="form-control" id="storage" name="Storage" value="{{ $product->Storage }}" required>
                </div>
        
                <div class="form-group">
                    <label for="bandwith"><i class="fas fa-wifi"></i> Bandwidth:</label>
                    <input type="text" class="form-control" id="bandwith" name="bandwidth" value="{{ $product->bandwidth }}" required>
                </div>
        
                <div class="form-group">
                    <label for="slug"><i class="fas fa-link"></i> Slug:</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}" required>
                </div>
        
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Update</button>
            </form>
        </div>
        @else
        <h1>Lỗi Không Nhận Diện Được Dich Vụ</h1>
    @endif
@endsection


