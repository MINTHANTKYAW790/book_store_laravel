@extends('layouts.home')
@section('content')
<div class="container">



    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Authorized Person List</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{url('admin/person/create')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-plus"></i> Add Authorized Person</a>
                    </ol>
                </div>

            </div>
            <table class="table table-bordered">
                <tr style="font-weight:bold">
                    <th>ID</th>

                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>

                    <th>position</th>
                    <th>action</th>

                </tr>

                @foreach ($users as $person)
                <tr>
                    <td>{{$loop -> index+1}}</td>

                    <td>{{$person -> name}}</td>
                    <td>{{$person -> email}}</td>
                    <td>{{$person -> phone}}</td>
                    <td>{{$person -> address}}</td>
                    <td>{{$person -> position}}</td>
                    <td>
                        <form action="{{url('admin/person/'.$person->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('admin/person/'.$person->id)}}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{url('admin/person/'.$person->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')"><i class="fa-solid fa-trash"></i></button>
                        </form>

                    </td>
                </tr>

                @endforeach



            </table>
            {{ $users->links() }}

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>
@endsection
<!-- </body>

</html> -->