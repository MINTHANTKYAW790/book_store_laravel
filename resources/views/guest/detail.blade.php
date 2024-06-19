@extends('welcome')
@section('guestContent')



<!-- Former detail page format -->
<div class="detailContainer  row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
    <div class="imageContainer" style="width: 30%;">
        <img src="{{asset('images/' . $books -> image)}}" alt="image" width=" 352px" height="485px">
    </div>
    <div style="width: 60%;" class="detailTextContainer">
        <h5 class="detailText author">{{ $books->author ? $books->author->author_name : 'something is missing!!!' }}</h5>
        <h5 class="detailText status">{{$books-> name}}</h5>
        <h6 class="detailText category">{{ $books->genre ? $books->genre->genre_name : 'something is missing!!!' }}</h6>
        <p class="detailText desciption">{{$books -> description}}</p>
        <div class="detailButton">
            <a href="{{$books -> pdf}}" download><button type="button" class="btn btn-orange">Download <i class="fa-solid fa-circle-down"></i></button></a>
            <a href="{{$books -> pdf}}" target="_blank"><button type="button" class="btn btn-orange">Read Online <i class="fa-solid fa-eye"></i></button></a>
        </div>
    </div>
</div>
@endsection