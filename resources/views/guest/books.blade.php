@extends('layouts.welcome')
@section('guestContent')

<h4 class="gridContainerTitle my-4">BOOKS</h4>
<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">

    @foreach ($books as $book)
    <div class="imageBox ">
        <a href="{{url('guest/detail/'.$book->id)}}">
            <img class="imageImageBox" src="{{asset('images/' . $book -> image)}}" alt="image" height="309px" width="224px" />
            <div class=" title"><i class="fa-solid fa-eye"></i>
            </div>

            <p style="color:black;" class="authorIndex">{{ $book->author ? $book->author->author_name : 'something is missing!!!' }}</p>


            <p style="color:black" class="statusIndex"><?php echo htmlspecialchars($book->name); ?></p>
            <p style="color:black;" class="authorIndex">{{ $book->publishingHouse ? $book->publishingHouse->name : 'something is missing!!!' }}</p>
        </a>
    </div>
    @endforeach
</div>
{{ $books->links() }}

@endsection