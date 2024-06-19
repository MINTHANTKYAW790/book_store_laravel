<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>

<body> -->

@extends('../home')


@section('authors')

<div class="container" id="genres">
    <!-- <h3>Genre List</h3>
    <a href="{{url('genres/create')}}" class="btn btn-primary btn-sm mb-2">Add Genre</a>
    @if (session('successAlert'))
    <div class='alert  alert-dismissible alert-info fade show' role='alert'>
        <strong>{{session('successAlert')}}</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    </div>
    @endif -->


    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Genre List</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{url('genres/create')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-add"></i> Add Genre</a>
                    </ol>
                </div>

            </div>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                @foreach ($genres as $genre)
                <tr>
                    <td>{{$genre -> id}}</td>
                    <td>{{$genre -> genre_name}}</td>
                    <td>
                        <a href="{{url('genres/'.$genre->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>

                    </td>
                </tr>

                @endforeach



            </table>
        </div>
        {{ $genres->links() }}

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>

@endsection
<!-- </body>

</html> -->