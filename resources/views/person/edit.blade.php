@extends('layouts.home')


@section('content')



<form action="{{url('admin/person/'.$users->id)}}" method="POST" class="container" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="card ">

        <div class="cardbody mt-3 ml-3">
            {{ var_dump($errors->all()) }}
            <h3 class="mb-4">Edit Authourized Person</h3>
            <!-- Name -->

            <div class="row mb-3">
                <label for="name" class="col-md-2 col-form-label offset-md-2">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name}}" required autocomplete="name" autofocus>

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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email}}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- 
            <div class="row mb-3">
                <label for="password" class="col-md-2 col-form-label offset-md-2">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div> -->

            <div class="row mb-3">
                <label for="phone" class="col-md-2 col-form-label offset-md-2">{{ __('Phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="new-phone" value="{{ $users->phone}}">

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
                    <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="new-address" value="{{ $users->address}}">

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
                    <input id="image" accept="image/*" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autocomplete="new-image">
                    <a href="{{asset('images/'.$users->image)}}" target="__blank">Current Image</a>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <!-- Role -->
            <div class="row mb-3">
                <label for="role" class="col-md-2 col-form-label offset-md-2">Position Name</label>
                <div class="col-md-6">
                    <select multiple name="roles[]" id="role" class="form-control multiple @error('role') is-invalid @enderror">

                        @foreach($roles as $role)
                        <option value="{{ $role }}">
                            {{ $role }}
                        </option>
                        @endforeach
                    </select>
                    @error('role')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <!-- <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Role:</strong>
                    <select class="form-control multiple" multiple name="roles[]">
                        @foreach ($roles as $role)
                        <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
            </div> -->

            <div class="row mb-3">
                <div class="col-md-6 offset-md-6">
                    <button type="submit" class="btn btn-primary offset-md-2 col-md-3 mt-2">Update</button>
                    <a href="{{url('admin/person')}}" type="button" class="btn btn-danger col-md-3 mt-2">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>@endsection