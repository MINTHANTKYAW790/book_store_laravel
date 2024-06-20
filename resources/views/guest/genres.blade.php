@extends('welcome')
@section('guestContent')

<!-- This is in the display period of the genre page -->
<h4 class="booksText">GENRES</h4>

<div class="logInProcess authorPage">
    <div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">

        @foreach ($genres as $genre)
        <a href='{{url('guest/genreBooks/'.$genre->id)}}' class='card namecard' style='width: 21.5rem; height:4rem;'>
            <div class='card-body'>
                <h5 style='hover{color:white}' class='card-title'>{{$genre->genre_name}}</h5>
            </div>
        </a>
        @endforeach

    </div>

</div>

</div>
@endsection