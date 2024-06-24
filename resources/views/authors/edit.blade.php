@extends('layouts/home')


@section('content')

<form action="{{url('admin/authors/'.$author->id)}}" method="POST" class="container">
    @csrf
    @method("PUT")

    <div class="card ">
        <div class="cardbody mt-3 ml-3">
            <h4>Edit Author</h4>
            <div class="row mb-3 mt-4">

                <label for="author_name" class="col-md-2 col-form-label">Author Name</label>
                <div class="col-md-6">
                    <input type="text" name="author_name" class="form-control @error('author_name') is-invalid @enderror" id="authorName" placeholder="Edit author name" value="{{$author->author_name}}">
                    @error('author_name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-primary col-md-3 mt-2">Update</button>
                    <a href="{{url('admin/authors')}}" type="button" class="btn btn-danger col-md-3 mt-2">Cancel</a>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection
<!-- </body>

</html> -->