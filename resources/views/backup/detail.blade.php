@extends('layouts/home')
@section('content')

<form action="{{url('admin/Books/'.$book->id)}}" method="POST" class="container" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="card ">
        <div class="cardbody mt-3 ml-3 ">
            <!-- {{ var_dump($errors->all()) }} -->

            <div class="row">
                <div class="col-sm-6">
                    <h4>Books / {{$book -> name}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mr-3">
                        <a href="{{url()->previous()}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </ol>
                </div>
            </div>



            <div class="detailContainer  row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
                <div class="leftDiv">

                    <!-- Save PDF -->
                    <div class="row mb-3">
                        <label for="save_pdf" class="col-md-6 col-form-label ">Pdf File</label>
                        <a class="col-md-6 col-form-label link" target="_blank" href="{{asset('pdfs/'.$book->save_pdf)}}">: &nbsp {{$book->name}}</a>
                    </div>
                    <!-- Image -->
                    <div class="row mb-3">
                        <div class="imageContainer" style="width: 30%;">
                            <img src="{{asset('images/' . $book -> image)}}" alt="image" width=" 322px" height="445px">
                        </div>
                    </div>



                </div>
                <div class="rightDiv">

                    <div class="row mb-3">
                        <label for="name" class="col-md-6 col-form-label ">Book Name </label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->name}}</label>
                    </div>

                    <!-- Code Number -->
                    <div class="row mb-3">
                        <label for="code_number" class="col-md-6 col-form-label ">Code Number</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->code_number}}</label>
                    </div>

                    <!-- Price -->
                    <div class="row mb-3">
                        <label for="price" class="col-md-6 col-form-label ">Price</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->price}}</label>
                    </div>

                    <!-- Publishing Date -->
                    <div class="row mb-3">
                        <label for="publishing_date" class="col-md-6 col-form-label ">Publishing Date</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->publishing_date}}</label>
                    </div>

                    <!-- Description -->
                    <div class="row mb-3">
                        <label for="description" class="col-md-6 col-form-label ">Description</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->description}}</label>
                    </div>

                    <!-- Author ID -->
                    <div class="row mb-3">
                        <label for="author_id" class="col-md-6 col-form-label ">Author Name</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->author->author_name}}</label>

                    </div>


                    <!-- Genre ID -->
                    <div class="row mb-3">
                        <label for="genre_id" class="col-md-6 col-form-label ">Genre </label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->genre->genre_name}}</label>
                    </div>


                    <!-- Publishing House ID -->
                    <div class="row mb-3">
                        <label for="publishing_house_id" class="col-md-6 col-form-label ">Publishing House Name</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->publishingHouse->name}}</label>
                    </div>




                    <!-- Edition -->
                    <div class="row mb-3">
                        <label for="edition" class="col-md-6 col-form-label ">Edition</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$book->edition}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<style>
    .link {
        cursor: pointer !important;

    }

    .link:hover {

        color: red !important;
    }
</style>

@endsection