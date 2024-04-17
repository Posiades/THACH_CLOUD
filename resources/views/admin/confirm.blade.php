@extends('admin/layout')
@section('title', 'CONFIRM')
@section('noidung')
<div class="container">
    <h2>CONFIRM</h2>
    <p>Bạn có chắc chắn muốn tiếp tục không?</p>
    <table class="table">
        <tr>
            <td>
                <form method="POST"  action="{{ route('admin.delete_hosting', $idkc) }}">
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