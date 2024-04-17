@extends('admin/layout')
@section('title', 'LIST VPS')
@section('noidung')

@if(Session::has('addvps'))
    <div class="alert alert-success">
        {{ Session::get('addvps') }}
    </div>
@endif

@if(Session::has('deletevps'))
    <div class="alert alert-success">
        {{ Session::get('deletevps') }}
    </div>
@endif

@if(Session::has('editvps'))
    <div class="alert alert-success">
        {{ Session::get('editvps') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">List of VPS</h2>
        </div>
        <div class="col-md-3 text-right">
            <a href="{{ route('admin.addvps') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add VPS</a>
        </div>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th> ID</th>
                <th><i class="fas fa-server"></i> Name</th>
                <th><i class="fas fa-info-circle"></i> Description</th>
                <th><i class="fas fa-dollar-sign"></i> Price</th>
                <th><i class="fas fa-database"></i> Storage</th>
                <th><i class="fas fa-wifi"></i> Bandwidth</th>
                <th><i class="fas fa-link"></i> Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vps as $vps)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'table-secondary' : '' }}">
                <td>{{ $vps->ID }}</td>
                <td>{{ $vps->name }}</td>
                <td>{{ $vps->mo_ta }}</td>
                <td>{{ $vps->GiaTien }}</td>
                <td>{{ $vps->Storage }}</td>
                <td>{{ $vps->bandwidth }}</td>
                <td>{{ $vps->slug }}</td>
                <td>
                    <a href="{{ route('admin.editservice', ['type'=>$vps->type_product, 'id'=>$vps->ID]) }}" class="btn btn-info btn-sm m-2"><i class="fas fa-edit"></i> Edit</a>
                    <a href="{{ route('admin.confirm', ['type'=>$vps->type_product,'id'=>$vps->ID]) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection