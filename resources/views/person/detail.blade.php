@extends('layouts/home')
@section('content')


<div class="container" id="authors">
    <div class="card ">
        <div class="cardbody mt-3 ml-3 ">
            <!-- {{ var_dump($errors->all()) }} -->
            <div class="row">
                <div class="col-sm-6">
                    <h4>Authorized Person / {{$users -> name}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mr-3">
                        <a href="{{url('admin/person/')}}" class="btn btn-primary btn-sm "><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </ol>
                </div>
            </div>

            <div class="detailContainer  row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
                <div class="leftDiv">

                    <!-- Image -->
                    <div class="row mb-3">
                        <div class="imageContainer" style="width: 30%;">
                            <img src="{{asset('images/' . $users -> image)}}" alt="image" width=" 322px" height="445px">
                        </div>
                    </div>



                </div>
                <div class="rightDiv">

                    <div class="row mb-3">
                        <label for="name" class="col-md-6 col-form-label ">Name </label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$users->name}}</label>
                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <label for="email" class="col-md-6 col-form-label ">Email</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$users->email}}</label>
                    </div>

                    <!-- Phone Number -->
                    <div class="row mb-3">
                        <label for="phone" class="col-md-6 col-form-label ">Phone Number</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$users->phone}}</label>
                    </div>

                    <!-- Address -->
                    <div class="row mb-3">
                        <label for="address" class="col-md-6 col-form-label ">Address</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$users->address}}</label>
                    </div>

                    <!-- Position -->
                    <div class="row mb-3">
                        <label for="position" class="col-md-6 col-form-label ">Position</label>
                        <label class="col-md-6 col-form-label ">: &nbsp {{$users->position}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <style>
    .link {
        cursor: pointer !important;

    }

    .link:hover {

        color: red !important;
    }
</style> -->

@endsection