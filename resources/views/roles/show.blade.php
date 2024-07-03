@extends('layouts.home')


@section('content')
<div class="container" id="positions">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb mb-4">
                    <div class="pull-left">
                        <h2> Show Role
                            <div class="float-end">
                                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                            </div>
                        </h2>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 mb-3">
                    <div class="form-group">
                        <strong>Permissions:</strong><br><br>
                        @if (!empty($rolePermissions))
                        @foreach ($rolePermissions as $v)
                        <label class="label label-secondary text-dark">{{ $v->name }},</label><br>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection