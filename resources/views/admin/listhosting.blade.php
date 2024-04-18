@extends('admin/layout')
@section('title', 'LIST HOSTING')
@section('noidung')

@if(Session::has('success_add'))
    <div class="alert alert-success">
        {{ Session::get('success_add') }}
    </div>
@endif

@if(Session::has('success_delete'))
    <div class="alert alert-success">
        {{ Session::get('success_delete') }}
    </div>
@endif

@if(Session::has('success_edit'))
    <div class="alert alert-success">
        {{ Session::get('success_edit') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">List of Hostings</h2>
        </div>
        <div class="col-md-3 text-right">
            <a href="{{ route('admin.add_service', ['type'=>$hosting->type_product]) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Hosting</a>
        </div>
    </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th> ID</th>
                <th><i class="fas fa-server"></i> Name</th>
                <th><i class="fas fa-tag"></i> Type</th>
                <th><i class="fas fa-info-circle"></i> Description</th>
                <th><i class="fas fa-dollar-sign"></i> Price</th>
                <th><i class="fas fa-database"></i> Data</th>
                <th><i class="fas fa-wifi"></i> Bandwidth</th>
                <th><i class="fas fa-link"></i> Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hosting as $hosting)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'table-secondary' : '' }}">
                <td>{{ $hosting->ID }}</td>
                <td>{{ $hosting->name }}</td>
                <td>{{ $hosting->type }}</td>
                <td>{{ $hosting->mo_ta }}</td>
                <td>{{ $hosting->GiaTien }}</td>
                <td>{{ $hosting->data_Hosting }}</td>
                <td>{{ $hosting->bandwith }}</td>
                <td>{{ $hosting->slug }}</td>
                <td>
                    <a href="{{ route('admin.editservice', ['type'=>$hosting->type_product,'id'=>$hosting->ID]) }}" class="btn btn-info btn-sm m-2"><i class="fas fa-edit"></i> Edit</a>
                    <a href="{{ route('admin.confirm', ['type'=>$hosting->type_product,'id'=>$hosting->ID]) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection