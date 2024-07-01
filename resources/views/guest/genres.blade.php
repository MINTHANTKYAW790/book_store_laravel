@extends('layouts.welcome')
@section('guestContent')

<!-- This is in the display period of the genre page -->
<h4 class="gridContainerTitle my-4 ">GENRES</h4>
<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3">
    @if($genres->isEmpty())
    <p style="color:black" class="statusIndex pl-4"> There is no genres.</p>
    @else


    @foreach ($genres as $genre)
    <a href='{{url('guest/genrebooks/'.$genre->id)}}' class='card namecard' style='width: 24rem; height:4rem;'>
        <div class='card-body'>
            <h5 style='hover{color:white}' class='card-title'>{{$genre->genre_name}}</h5>
        </div>
    </a>
    @endforeach
</div>
@endif


{{ $genres->links() }}

@endsection