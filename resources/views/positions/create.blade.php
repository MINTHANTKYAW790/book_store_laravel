@extends('layouts/home')


@section('content')




<form action="{{url('admin/positions')}}" method="post" class="container">
    {{csrf_field()}}
    <div class="card ">
        <div class="cardbody mt-3 ml-3">
            <h3>Create New Position</h3>
            <div class="row mb-3 mt-4">

                <label for="position_name" class="col-md-2 col-form-label">Position Name</label>
                <div class="col-md-6">

                    <input type="text" name="position_name" class="form-control @error('position_name') is-invalid @enderror" id="position_name" placeholder="Enter new position name">
                    @error('position_name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-primary col-md-3 mt-2">Create</button>
                    <a href="{{url('admin/positions')}}" type="button" class="btn btn-danger col-md-3 mt-2">Cancel</a>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection