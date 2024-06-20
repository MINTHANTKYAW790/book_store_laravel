<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body> -->

@extends('home')
@section('authors')

<form action="{{url('books')}}" method="post" class="container" enctype="multipart/form-data">
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
                    <input type="text" name="code_number" class="form-control @error('code_number') is-invalid @enderror" id="code_number" placeholder="Enter new book code number" value="{{ old('code_number') }}">
                    @error('code_number')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <!-- Price -->
            <div class="row mb-3">
                <label for="price" class="col-md-2 col-form-label offset-md-2">Price</label>

                <div class="col-md-6">
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
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
                    <input id="publishing_date" type="date" class="form-control @error('publishing_date') is-invalid @enderror" name="publishing_date" value="{{ old('publishing_date') }}">
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
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}">
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
                    <select name="author_id" id="author_id" class="form-control @error('author_id') is-invalid @enderror">
                        <option>Choose Author ...</option>
                        @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->author_name }}</option>
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
                        <option>Choose Genre ...</option>
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
                    <select name="publishing_house_id" id="publishing_house_id"  class="form-control @error('publishing_house_id') is-invalid @enderror" required>
                        <option>Choose Publishing House ...</option>
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
                    <input id="edition" type="number" class="form-control @error('edition') is-invalid @enderror" name="edition" value="{{ old('edition') }}">
                    @error('edition')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-primary col-md-5 mt-2">Create</button>
                    <a href="{{url('books')}}" type="button" class="btn btn-danger col-md-5 mt-2" style='float:right;'>Cancel</a>
                </div>
            </div>





        </div>
    </div>
</form>
@endsection
<!-- </body>

</html> -->