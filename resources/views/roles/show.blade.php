@extends('layouts.home')


@section('content')
<div class="container" id="positions">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Role Details / {{$role -> name}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mr-3">
                        <a href="{{url('admin/roles/')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </ol>
                </div>
            </div>


            <div class="row">

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