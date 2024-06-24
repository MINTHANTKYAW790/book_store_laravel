@extends('layouts/home')


@section('content')



<form action="{{url('admin/genres/'.$genres->id)}}" method="POST" class="container">
    @csrf
    @method("PUT")
    <div class="card ">
        <div class="cardbody mt-3 ml-3">
            <h4>Edit Genre</h4>
            <div class="row mb-3 mt-4">

                <label for="genre_name" class="col-md-2 col-form-label">Genre Name</label>
                <div class="col-md-6">
                    <input type="text" name="genre_name" class="form-control @error('genre_name') is-invalid @enderror" id="genre_name" placeholder="Edit genre name" value="{{$genres->genre_name}}">
                    @error('genre_name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-primary col-md-3 mt-2">Update</button>
                    <a href="{{url('admin/genres')}}" type="button" class="btn btn-danger col-md-3 mt-2">Cancel</a>
                </div>
            </div>

        </div>
    </div>
</form>@endsection