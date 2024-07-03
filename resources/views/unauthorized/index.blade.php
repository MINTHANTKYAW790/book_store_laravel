@extends('layouts.home')
@section('content')
<div class="container">



    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Unauthorized Person List</h4>
                </div>


            </div>
            @if($users->isEmpty())
            <p style="color:black" class="statusIndex"> There is no unauthorized person.</p>
            @else
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
                    <td>
                        @if(!empty($person->getRoleNames()))
                        @foreach($person->getRoleNames() as $v)
                        {{ $v }}
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <form id="restore-form-{{$person->id}}" action="{{url('admin/unauthorized/'.$person->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('admin/unauthorized/'.$person->id)}}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <button type="button" class="btn btn-success btn-sm" onclick="confirmRestore('{{ $person->id }}','{{ $person->name }}')"><i class="fa-solid fa-arrows-spin"></i></button>

                        </form>

                    </td>
                </tr>

                @endforeach



            </table>
            {{ $users->links() }}
            @endif

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>
@endsection