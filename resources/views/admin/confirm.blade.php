@extends('admin/layout')
@section('title', 'CONFIRM')
@section('noidung')
<div class="container">
    <h2>CONFIRM</h2>
    <p>Bạn có chắc chắn muốn tiếp tục không Xóa {{$product->type_product}} {{$product->name}}?</p>
    <table class="table">
        <tr>
            <td>
                <form method="POST"  action="{{ route("admin.delete_$product->type_product", ['id'=>$product->ID]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Tiếp tục</button>
                </form>
            </td>
            <td>
                <a href="#" class="btn btn-danger">
                    <i class="fas fa-times-circle"></i> Hủy
                </a>
            </td>
        </tr>
    </table>
</div>
@endsection