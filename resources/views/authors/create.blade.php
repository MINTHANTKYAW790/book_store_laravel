@extends('layouts/home')


@section('content')


<form action="{{url('admin/authors')}}" method="post" class="container">
    <div class="card ">
        <div class="cardbody mt-3 ml-3">
            <h4>Create New Author</h4>
            {{csrf_field()}}
            <div class="row mb-3 mt-4">


                <label for="author_name" class="col-md-2 col-form-label">Author Name</label>

                <div class="col-md-6">
                    <input type="text" name="author_name" class="form-control @error('author_name') is-invalid @enderror" id="authorName" placeholder="Enter new author name">
                    @error('author_name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-primary col-md-3 mt-2">Create</button>
                    <a href="{{url('admin/authors')}}" type="button" class="btn btn-danger col-md-3 mt-2">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
<!-- </body>

</html> -->