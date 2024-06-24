@extends('layouts.home')
@section('content')

<form action="{{url('admin/publishinghouses/'.$publishinghouses->id)}}" method="POST" class="container">
    @csrf
    @method("PUT")
    <div class="card ">
        <div class="cardbody mt-3 ml-3">
            <h4>Edit Publishing House</h4>
            <div class="row mb-3 mt-4">

                <label for="name" class="col-md-2 col-form-label">Publishing House Name</label>
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Edit publishing house name" value="{{$publishinghouses->name}}">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-primary col-md-3 mt-2">Update</button>
                    <a href="{{url('admin/publishinghouses')}}" type="button" class="btn btn-danger col-md-3 mt-2">Cancel</a>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection