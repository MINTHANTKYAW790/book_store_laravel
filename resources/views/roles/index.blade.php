@extends('layouts.home')

@section('content')
<div class="container" id="positions">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Manage Roles</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{url('admin/roles/create')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-add"></i> Add Roles</a>
                    </ol>
                </div>

            </div>

            <!-- @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif -->

            <table class="table table-bordered table-hover mb-2">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $roles->firstItem() + $key }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">

                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('roles.edit', $role->id) }}" class=" btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>

                            <!-- <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                            @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            @endcan -->


                            @csrf
                            @method('DELETE')
                            @can('product-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>

                @endforeach
            </table>

            {!! $roles->render() !!}
            @endsection