<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body> -->
@extends('../home')


@section('authors')

<form action="{{url('authors/'.$author->id)}}" method="POST" class="container">
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
                    <button type="submit" class="btn btn-primary col-md-5 mt-2">Update</button>
                    <a href="{{url('authors')}}" type="button" class="btn btn-danger col-md-5 mt-2" style='float:right;'>Cancel</a>

                </div>
            </div>
        </div>
    </div>
</form>
@endsection
<!-- </body>

</html> -->