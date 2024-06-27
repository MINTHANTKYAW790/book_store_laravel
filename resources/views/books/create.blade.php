@extends('layouts/home')
@section('content')

<form action="{{url('admin/books')}}" method="post" class="container" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="card ">
        <div class="cardbody mt-3 ml-3">
            <!-- {{ var_dump($errors->all()) }} -->
            <h3 class="mb-4">Create New Book</h3>
            <!-- Name -->


            <div class="row mb-3">
                <label for="name" class="col-md-2 col-form-label offset-md-2">Title</label>
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter new book name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <!-- Code Number -->
            <div class="row mb-3">
                <label for="code_number" class="col-md-2 col-form-label offset-md-2">Code Number</label>

                <div class="col-md-6">
                    <input type="text" name="code_number" min="0" class="form-control @error('code_number') is-invalid @enderror" id="code_number" placeholder="Enter new book code number" value="{{ old('code_number') }}">
                    @error('code_number')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <!-- Price -->
            <div class="row mb-3">
                <label for="price" class="col-md-2 col-form-label offset-md-2">Price</label>

                <div class="col-md-6">
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Enter book price" name="price" value="{{ old('price') }}">
                    @error('price')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Publishing Date -->
            <div class="row mb-3">
                <label for="publishing_date" class="col-md-2 col-form-label offset-md-2">Publishing Date</label>

                <div class="col-md-6">
                    <input id="publishing_date" type="date" class="form-control @error('publishing_date') is-invalid @enderror" name="publishing_date" value="{{ old('publishing_date') }}" placeholder="dd-mm-yyyy">
                    @error('publishing_date')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="row mb-3">
                <label for="description" class="col-md-2 col-form-label offset-md-2">Description</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Enter book descripiton" name="description" value="{{ old('description') }}">
                    @error('description')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


            <!-- Author ID -->
            <div class="row mb-3">
                <label for="author_id" class="col-md-2 col-form-label offset-md-2">Author Name</label>

                <div class="col-md-6">
                    <select name="author_id" id="author_id" class="form-control @error('author_id') is-invalid @enderror required" required>
                        @foreach($authors as $author)
                        <option name="author_id" value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }} required id="author_id">{{ $author->author_name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>



            <!-- Genre ID -->
            <div class="row mb-3">
                <label for="genre_id" class="col-md-2 col-form-label offset-md-2">Genre </label>

                <div class="col-md-6">
                    <select name="genre_id" id="genre_id" class="form-control @error('genre_id') is-invalid @enderror" required>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : ''  }} name="genre_id" id="genre_id" class="form-control @error('genre_id') is-invalid @enderror" required>{{ $genre->genre_name }}</option>
                        @endforeach
                    </select>
                    @error('genre_id')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


            <!-- Publishing House ID -->
            <div class="row mb-3">
                <label for="publishing_house_id" class="col-md-2 col-form-label offset-md-2">Publishing House Name</label>

                <div class="col-md-6">
                    <select name="publishing_house_id" id="publishing_house_id" class="form-control @error('publishing_house_id') is-invalid @enderror" required>
                        @foreach($publishinghouses as $publishinghouse)
                        <option value="{{ $publishinghouse->id }}" {{ old('publishing_house_id') == $publishinghouse->id ? 'selected' : '' }} required>{{ $publishinghouse->name }}</option>
                        @endforeach
                    </select>
                    @error('publishing_house_id')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Image -->
            <div class="row mb-3">
                <label for="image" class="col-md-2 col-form-label offset-md-2">Book Cover</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*" name="image" value="{{ old('image') }}">
                    @error('image')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Save PDF -->
            <div class="row mb-3">
                <label for="save_pdf" class="col-md-2 col-form-label offset-md-2">Pdf File</label>

                <div class="col-md-6">
                    <input id="save_pdf" type="file" class="form-control @error('save_pdf') is-invalid @enderror" accept="application/pdf" name="save_pdf" value="{{ old('save_pdf') }}">
                    @error('save_pdf')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Edition -->
            <div class="row mb-3">
                <label for="edition" class="col-md-2 col-form-label offset-md-2">Edition</label>

                <div class="col-md-6">
                    <input id="edition" type="number" min="1" class="form-control @error('edition') is-invalid @enderror" placeholder="Enter book edition" name="edition" value="{{ old('edition') }}">
                    @error('edition')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <!-- Button -->
            <div class="row mb-3">
                <div class="col-md-6 offset-md-6">
                    <button type="submit" class="btn btn-primary offset-md-2 col-md-3 mt-2">Create</button>
                    <a href="{{url('admin/books')}}" type="button" class="btn btn-danger col-md-3 mt-2">Cancel</a>
                </div>
            </div>



        </div>
    </div>
</form>
@endsection
<!-- </body>

</html> -->