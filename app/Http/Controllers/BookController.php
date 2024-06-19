<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
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

    public function index()
    {
        $books = Books::latest()->with(['author', 'genre', 'publishingHouse','user'])->paginate(6);
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
        $authors = Author::all();
        $genres = Genre::all();
        $publishinghouses = PublishingHouse::all();

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
        $request->validate(['name' => 'required']);
        $request->validate(['code_number' => 'required']);
        $request->validate(['price' => 'required']);
        $request->validate(['publishing_date' => 'required']);
        $request->validate(['description' => 'required']);
        $request->validate(['image' => 'required']);
        $request->validate(['save_pdf' => 'required']);
        $request->validate(['author_id' => 'required']);
        $request->validate(['genre_id' => 'required']);
        $request->validate(['publishing_house_id' => 'required']);
        $request->validate(['edition' => 'required']);

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
        return redirect('books')->with('successAlert', 'You have successfully created! ' . $request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('books.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishinghouses = PublishingHouse::all();
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
        $request->validate(['name' => 'required']);
        $request->validate(['code_number' => 'required']);
        $request->validate(['price' => 'required']);
        $request->validate(['publishing_date' => 'required']);
        $request->validate(['description' => 'required']);
        $request->validate(['image' => 'required']);
        $request->validate(['save_pdf' => 'required']);
        $request->validate(['author_id' => 'required']);
        $request->validate(['genre_id' => 'required']);
        $request->validate(['publishing_house_id' => 'required']);
        $request->validate(['edition' => 'required']);

        $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageFileName);

        $pdfFileName = auth()->id() . '_' . time() . '.' . $request->file('save_pdf')->extension();
        $request->file('save_pdf')->move(public_path('pdfs'), $pdfFileName);

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
            'inserted_by' => 0
        ]);
        return redirect('books')->with('successAlert', 'You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Books::find($id)->delete();
        return redirect('books')->with('successAlert', 'You have successfully deleted! ');
    }
}
