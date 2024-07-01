@extends('layouts.welcome')
@section('guestContent')

<div class="row gridContainerTitle my-4" style="height:25.91px">

  <h4 class="col-sm-6 m-0 p-0">AUTHORS / {{$authors->author_name}}</h4>

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <a href="{{url('guest/authors/')}}" class="btn btn-primary btn-sm  "><i class="fa-solid fa-arrow-left"></i> Back</a>
    </ol>
  </div>
</div>


<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
  @if($books->isEmpty())
  <p style="color:black" class="statusIndex pl-4"> There is no books.</p>
  @else
  @foreach ($books as $book)

  <div class='imageBox '>
    <a href='{{url('guest/detail/'.$book->id)}}'>

      <img class="imageImageBox" src="{{asset('images/' . $book -> image)}}" alt="image" height="309px" width="224px" />
      <div class=' title1'><i class='fa-solid fa-eye'></i>
      </div>

      <p style='color:black' class='statusIndex'>{{$book->name}}</p>

    </a>
  </div>
  @endforeach
  @endif
</div>



@endsection