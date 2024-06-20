@extends('welcome')
@section('guestContent')
<h4 class="gridContainerTitle my-4">AUTHORS</h4>
<!-- </div> -->
<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-5 row-cols-lg-5">

  @foreach ($authors as $author)

  <a href='{{url('guest/authorbooks/'.$author->id)}}' class='card namecard' style='width: 13.7rem;'>
    <div class='card-body'>
      <h5 style='hover{color:white}' class='card-title'>{{$author -> author_name}}</h5>
    </div>
  </a>
  @endforeach

</div>
</div>
{{ $authors->links() }}
@endsection