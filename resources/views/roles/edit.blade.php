@extends('layouts.home')


@section('content')
<div class="container" id="positions">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Edit Role / {{$role -> name}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mr-3">
                        <a href="{{url('admin/roles/')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </ol>
                </div>
            </div>


            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-xs-12 mb-3">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class="col-xs-12 mb-3">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br />
                            @foreach ($permission as $value)
                            <label>
                                <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif name="permission[]"
                                value="{{ $value->name }}" class="name">
                                {{ $value->name }}</label>
                            <br />
                            @endforeach
                        </div>
                    </div>

                    <div class="col-xs-12 mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection