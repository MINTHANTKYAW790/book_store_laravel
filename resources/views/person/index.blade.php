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
@extends('home')
@section('authors')
<div class="container">
    <!-- <h3>persons List</h3>
    <a href="{{url('persons/create')}}" class="btn btn-primary btn-sm mb-2">Add persons</a>
    @if (session('successAlert'))
    <div class='alert  alert-dismissible alert-success fade show' role='alert'>
        <strong>{{session('successAlert')}}</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
    </div>
    @endif -->


    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Authorized Person List</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{url('person/create')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-plus"></i> Add Authorized Person</a>
                    </ol>
                </div>

            </div>
            <table class="table table-bordered">
                <tr style="font-weight:bold">
                    <th>ID</th>
                    <th>image</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>

                    <th>position</th>

                </tr>

                @foreach ($persons as $person)
                <tr>
                    <td>{{$person -> id}}</td>
                    <td><img src="C:/xampp/htdocs/personStoreLaravel/public/images/{{$person -> image}}" alt="image" width=" 352px" height="485px"></td>
                    <td>{{$person -> name}}</td>
                    <td>{{$person -> email}}</td>
                    <td>{{$person -> genre_id}}</td>
                    <td>{{$person -> phone}}</td>
                    <td>{{$person -> address}}</td>
                    <td>{{$person -> position}}</td>
                    <td>
                        <form action="{{url('person/'.$person->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('person/'.$person->id.'/detail')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{url('person/'.$person->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')"><i class="fa-solid fa-trash"></i></button>
                        </form>

                    </td>
                </tr>

                @endforeach



            </table>
            {{ $persons->links() }}

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>
@endsection
<!-- </body>

</html> -->