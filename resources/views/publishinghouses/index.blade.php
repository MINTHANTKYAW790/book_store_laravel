@extends('layouts.home')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Publishing House List</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{url('admin/publishinghouses/create')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-add"></i> Add Publishing House</a>
                    </ol>
                </div>

            </div>
            <table class="table table-bordered table-hover mb-2">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                @foreach ($publishinghouses as $publishighouse)
                <tr>
                    <td>{{$loop -> index+1}}</td>
                    <td>{{$publishighouse -> name}}</td>
                    <td>
                        <a href="{{url('admin/publishinghouses/'.$publishighouse->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $publishinghouses->links() }}
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>
@endsection