@extends('layouts.welcome')
@section('guestContent')


<h4 class='booksText'>PUBLISHING HOUSES / {{$publishing_houses->name}}</h4>";



<!-- This is in the display period of the BOOKS page -->
<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">



    @if($books->isEmpty())
    <p style="color:black" class="statusIndex pl-4"> There is no books.</p>
    @else

    @foreach ($books as $book)


    <div class='imageBox '>
        <a href='{{url('guest/detail/'.$book->id)}}'>

            <img class="imageImageBox" src="{{asset('images/' . $book -> image)}}" alt="image" height="309px" width="224px" />
            <div class=' title'><i class='fa-solid fa-magnifying-glass'></i>
            </div>

            <p style='color:black' class='statusIndex'>{{$book->name}}</p>

        </a>
    </div>
    @endforeach
    @endif
</div>


@endsection