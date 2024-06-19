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


<form action="{{url('publishinghouses')}}" method="post" class="container">
    {{csrf_field()}}
    <div class="card">
        <div class="cardbody mt-3 ml-3">
            <h3>Create New Publishing House</h3>
            <div class="row mb-3 mt-4">

                <label for="name" class="col-md-2 col-form-label">Publishing House Name</label>
                <div class="col-md-6">

                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter new publishing house name">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary col-md-5 mt-2">Confirm</button>
                    <a href="{{url('publishinghouses')}}" type="button" class="btn btn-danger col-md-5 mt-2" style='float:right;'>Cancel</a>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection
<!-- </body>

</html> -->