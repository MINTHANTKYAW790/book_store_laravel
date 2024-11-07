@extends('layouts.welcome')
@section('guestContent')

<h4 class="gridContainerTitle my-4 ">PUBLISHING HOUSES</h4>
<div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3">
    @if($publishinghouses->isEmpty())
    <p style="color:black" class="statusIndex pl-4"> There is no publishing houses.</p>
    @else


    <?php foreach ($publishinghouses as $publishinghouse) : ?>
        <a href='{{url('guest/pbhbooks/'.$publishinghouse->id)}}' class='card namecard' style='width: 22.5rem; height:4rem;'>
            <div class='card-body'>
                <h5 style='hover{color:white}' class='card-title'>{{$publishinghouse->name}}</h5>
            </div>
        </a>
    <?php endforeach; ?>


    @endif
</div>
{{ $publishinghouses->links() }}
@endsection