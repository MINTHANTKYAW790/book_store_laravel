@extends('layouts/home')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Backup Bin</h4>
                </div>


            </div>
            @if($books->isEmpty())
            <p style="color:black" class="statusIndex"> There is no deleted books.</p>
            @else
            <table class="table table-bordered">
                <tr style="font-weight:bold">
                    <th>No</th>
                    <!-- <th>Image</th> -->
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publishing House</th>
                    <th>code_number</th>
                    <th>Created at</th>
                    <th>Inserted By</th>
                    <th>Action</th>
                </tr>

                @foreach ($books as $book)
                <tr>
                    <td>{{$loop -> index+1}}</td>
                    <!-- <td><img src="{{asset('images/' . $book -> image)}}" alt="image" width=" 352px" height="485px"></td> -->
                    <td>{{$book -> name}}</td>
                    <td>{{ $book->author ? $book->author->author_name : 'something is missing!!!' }}</td>
                    <td>{{ $book->genre ? $book->genre->genre_name : 'something is missing!!!' }}</td>
                    <td>{{ $book->publishingHouse ? $book->publishingHouse->name : 'something is missing!!!' }}</td>
                    <td>{{$book -> code_number}}</td>
                    <td>{{$book -> created_at}}</td>
                    <td>{{ $book->user ? $book->user->name : 'something is missing!!!' }}</td>
                    <td>

                        <form action="{{url('admin/backup/'.$book->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('admin/backup/'.$book->id)}}" class=" btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>

                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure want to restore {{$book -> name}}?')"><i class="fa-solid fa-arrows-spin"></i></button>
                        </form>

                    </td>
                </tr>



                @endforeach



            </table>
            {{ $books->links() }}
            @endif

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>
@endsection
<!-- </body>

</html> -->