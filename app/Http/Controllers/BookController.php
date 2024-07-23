<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\User;
use App\Models\Author;
use App\Models\Genre;
use App\Models\PublishingHouse;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function __construct()
    // {
    //     $this->middleware(['permission:book-list|book-detail|book-create|book-edit|book-delete'], ['only' => ['index', 'show']]);
    //     $this->middleware(['permission:book-detail'], ['only' => ['show']]);
    //     $this->middleware(['permission:book-create'], ['only' => ['create', 'store']]);
    //     $this->middleware(['permission:book-edit'], ['only' => ['edit', 'update']]);
    //     $this->middleware(['permission:book-delete'], ['only' => ['destroy']]);
    // }

    public function index()


    {
        $limit = 10;
        $books = Books::latest()->where('deleted', 0)->take($limit)->with(['author', 'genre', 'publishingHouse', 'user'])->paginate(10);
        // $books = Books::latest()->paginate(5);


        return view('books.index', compact('books'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('author_name', 'ASC')->get();
        $genres = Genre::orderBy('genre_name', 'ASC')->get();
        $publishinghouses = PublishingHouse::orderBy('name', 'ASC')->get();

        return view('books.create', compact('authors', 'genres', 'publishinghouses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code_number' => 'required',
            'price' => 'required',
            'publishing_date' => 'required',
            'description' => 'required',
            'image' => 'required',
            'save_pdf' => 'required',
            'author_id' => 'required',
            'genre_id' => 'required',
            'publishing_house_id' => 'required',
            'edition' => 'required',

        ]);



        $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageFileName);

        $pdfFileName = auth()->id() . '_' . time() . '.' . $request->file('save_pdf')->extension();
        $request->file('save_pdf')->move(public_path('pdfs'), $pdfFileName);

        Books::create(
            [
                'name' => $request->name,
                'code_number' => $request->code_number,
                'price' => $request->price,
                'publishing_date' => $request->publishing_date,
                'description' => $request->description,
                'image' => $imageFileName,
                'save_pdf' => $pdfFileName,
                'author_id' => $request->author_id,
                'genre_id' => $request->genre_id,
                'publishing_house_id' => $request->publishing_house_id,
                'edition' => $request->edition,
                'deleted' => 0,
                'inserted_by' => auth()->user()->id

            ]

        );
        return redirect('admin/books')->with('successAlert', 'You have successfully created! ' . $request->name);
    }

    public function messages()
    {
        return [
            'username.regex' => 'The username may only contain letters, numbers, spaces, and underscores.',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishingHouses = PublishingHouse::all();
        $books = Books::find($id);
        return view('books.detail', compact('books', 'genres', 'publishingHouses', 'authors'));
    }
    public function detail($id)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishingHouses = PublishingHouse::all();
        $books = Books::find($id);
        return view('books.detail', compact('books', 'genres', 'publishingHouses', 'authors'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::orderBy('author_name', 'ASC')->get();
        $genres = Genre::orderBy('genre_name', 'ASC')->get();
        $publishinghouses = PublishingHouse::orderBy('name', 'ASC')->get();
        $books = Books::find($id);
        return view('books.edit', compact('books', 'genres', 'publishinghouses', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code_number' => 'required',
            'price' => 'required',
            'publishing_date' => 'required',
            'description' => ['required', 'max:255'],
            'author_id' => 'required',
            'genre_id' => 'required',
            'publishing_house_id' => 'required',
            'edition' => 'required',



        ]);
        $book = Books::find($id);
        $imageFileName = $book->image;
        if ($request->hasFile('image')) {
            $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('images'), $imageFileName);
        }
        $pdfFileName = $book->save_pdf;
        if ($request->hasFile('save_pdf')) {
            $pdfFileName = auth()->id() . '_' . time() . '.' . $request->file('save_pdf')->extension();
            $request->file('save_pdf')->move(public_path('pdfs'), $pdfFileName);
        }

        Books::find($id)->update([
            'name' => $request->name,
            'code_number' => $request->code_number,
            'price' => $request->price,
            'publishing_date' => $request->publishing_date,
            'description' => $request->description,
            'image' => $imageFileName,
            'save_pdf' => $pdfFileName,
            'author_id' => $request->author_id,
            'genre_id' => $request->genre_id,
            'publishing_house_id' => $request->publishing_house_id,
            'edition' => $request->edition,
            'deleted' => 0,
            'inserted_by' => auth()->user()->id
        ]);
        return redirect('admin/books')->with('successAlert', 'You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $books = Books::find($id);
        // Books::find($id)->update([
        //     'deleted' => 1,
        //     'inserted_by' => auth()->user()->id
        // ]);
        // return redirect('admin/books')->with('successAlert', 'You have successfully deleted! ' . $books->name);
        $books = Books::find($id);

        if (!$books) {
            return redirect('admin/books')->with('dangerAlert', 'Books not found! ');
        }

        $books->delete();

        return redirect('admin/books')->with('successAlert', 'You have successfully deleted! ' . $books->name);
    }
}
