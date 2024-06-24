@extends('layouts/home')


@section('content')

<div class="container" id="genres">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Genre List</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{url('admin/genres/create')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-add"></i> Add Genre</a>
                    </ol>
                </div>

            </div>
            <table class="table table-bordered table-hover mb-2">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                @foreach ($genres as $genre)
                <tr>
                    <td>{{$loop -> index+1}}</td>
                    <td>{{$genre -> genre_name}}</td>
                    <td>
                        <a href="{{url('admin/genres/'.$genre->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>

                    </td>
                </tr>

                @endforeach



            </table>
            {{ $genres->links() }}
        </div>


    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>

@endsection
<!-- </body>

</html> -->