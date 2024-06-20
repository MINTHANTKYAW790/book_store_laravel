@extends('welcome')
@section('guestContent')

<div class='detailContainer mySlides'>
  <div class='insideDetailTextContainer row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2'>
    <div style='width: 60%;' class='detailTextContainer'>
      <h5 class='detailText author'>{{$genres->genre_name}}</h5>
    </div>
  </div>
</div>

<h4 class='booksText'>GENRES / {{$genres->genre_name}}</h4>";



<!-- This is in the display period of the BOOKS page -->
<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">





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
</div>


@endsection