@extends('layouts/home')


@section('content')

<div class="container" id="positions">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Position List</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{url('admin/positions/create')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-add"></i> Add Position</a>
                    </ol>
                </div>

            </div>
            <table class="table table-bordered table-hover mb-2">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                @foreach ($positions as $position)
                <tr>
                    <td>{{$loop -> index+1}}</td>
                    <td>{{$position -> position_name}}</td>
                    <td>
                        <a href="{{url('admin/positions/'.$position->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>

                    </td>
                </tr>

                @endforeach



            </table>
            {{ $positions->links() }}
        </div>


    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>

@endsection