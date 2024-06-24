@extends('layouts/home')
@section('content')

<form action="{{url('admin/person')}}" method="post" class="container" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="card ">
        <div class="cardbody mt-3 ml-3">
            <!-- {{ var_dump($errors->all()) }} -->
            <h3 class="mb-4">Create New Authourized Person</h3>
            <!-- Name -->


            <div class="row mb-3">
                <label for="name" class="col-md-2 col-form-label offset-md-2">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Enter Name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-2 col-form-label offset-md-2">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-2 col-form-label offset-md-2">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-2 col-form-label offset-md-2">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
            </div>

            <div class="row mb-3">
                <label for="phone" class="col-md-2 col-form-label offset-md-2">{{ __('Phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="new-phone" placeholder="Enter Phone Number">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="address" class="col-md-2 col-form-label offset-md-2">{{ __('Address') }}</label>

                <div class="col-md-6">
                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="new-address" placeholder="Enter Address">

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="image" class="col-md-2 col-form-label offset-md-2">{{ __('Image') }}</label>

                <div class="col-md-6">
                    <input id="image" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="new-image">

                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="position" class="col-md-2 col-form-label offset-md-2">{{ __('Position') }}</label>

                <div class="col-md-6">
                    <input id="position" type="position" class="form-control @error('position') is-invalid @enderror" name="position" required autocomplete="new-posi0tion" placeholder="Enter Position">

                    @error('position')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-6">
                    <button type="submit" class="btn btn-primary offset-md-2 col-md-3 mt-2">Create</button>
                    <a href="{{url('admin/person')}}" type="button" class="btn btn-danger col-md-3 mt-2">Cancel</a>
                </div>
            </div>






        </div>
    </div>
</form>
@endsection
<!-- </body>

</html> -->