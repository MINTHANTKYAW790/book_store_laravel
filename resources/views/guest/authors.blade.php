@extends('layouts.welcome')
@section('guestContent')
<h4 class="gridContainerTitle my-4">AUTHORS</h4>
<!-- </div> -->
<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-5 row-cols-lg-5">
  @if($authors->isEmpty())
  <p style="color:black" class="statusIndex pl-4"> There is no authors.</p>
  @else
  @foreach ($authors as $author)

  <a href='{{url('guest/authorbooks/'.$author->id)}}' class='card namecard' style='width: 13.7rem;'>
    <img src='{{asset('images/user.jpg')}}' class='mt-3' height='200px' alt='author image' style="border-radius:10px">
    <div class='card-body'>
      <h5 style='hover{color:white}' class='card-title'>{{$author -> author_name}}</h5>
    </div>


  </a>
  @endforeach
  @endif
</div>
</div>
{{ $authors->links() }}
@endsection