@extends('layouts/home')
@section('content')
<div class="container">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Books List</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{url('admin/books/create')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-plus"></i> Add Books</a>
                    </ol>
                </div>

            </div>
            <table class="table table-bordered mb-2">
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
                    <th style="width:120px">Action</th>
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
                        <form id="delete-form-{{$book->id}}" action="{{url('admin/books/'.$book->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('admin/books/'.$book->id)}}" class=" btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{url('admin/books/'.$book->id.'/edit')}}" class="btn btn-success btn-sm"><i class="fa-solid fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $book->id }}','{{ $book->name }}')"><i class="fa-solid fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </table>
            {{ $books->links() }}
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('javascript/index.js')}}"></script>
@endsection