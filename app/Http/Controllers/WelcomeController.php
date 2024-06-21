<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Author;
use App\Models\Genre;
use App\Models\PublishingHouse;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $books = Books::latest()->orderBy('name', 'ASC')->with(['author', 'genre', 'publishingHouse'])->paginate(10);
        // $books = Books::latest()->paginate(5);
        return view('guest.index', compact('books'));
    }

    public function detail($id)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishinghouses = PublishingHouse::all();
        $books = Books::find($id);
        return view('guest.detail', compact('books', 'genres', 'publishinghouses', 'authors'));
    }

    public function books()
    {
        $books = Books::orderBy('name', 'ASC')->with(['author', 'genre', 'publishingHouse'])->paginate(10);
        // $books = Books::latest()->paginate(5);
        return view('guest.books', compact('books'));
    }
    public function authors()
    {
        $authors = Author::orderBy('author_name', 'ASC')->paginate(10);
        return view('guest.authors', compact('authors'));
    }
    public function genres()
    {
        $genres = Genre::orderBy('genre_name', 'ASC')->paginate(9);
        return view('guest.genres', compact('genres'));
    }
    public function publishinghouses()
    {
        $publishinghouses = PublishingHouse::orderBy('name', 'ASC')->paginate(9);
        return view('guest.publishinghouses', compact('publishinghouses'));
    }
    public function authorbooks($id)
    {


        $books = Books::where('author_id', $id)->get();
        $authors = Author::where('id', $id)->first();
        return view('guest.authorBooks', compact('books', 'authors'));
    }
    public function genrebooks($id)
    {
        $books = Books::where('genre_id', $id)->get();
        $genres = Genre::where('id', $id)->first();
        return view('guest.genrebooks', compact('books', 'genres'));
    }
    public function pbhbooks($id)
    {
        $books = Books::where('publishing_house_id', $id)->get();
        $publishing_houses = PublishingHouse::where('id', $id)->first();
        return view('guest.pbhbooks', compact('books', 'publishing_houses'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Books::with(['author', 'genre', 'publishingHouse'])
            ->where('name', 'like', "%{$query}%")
            ->orWhereHas('author', function ($q) use ($query) {
                $q->where('author_name', 'like', "%{$query}%");
            })
            ->orWhereHas('genre', function ($q) use ($query) {
                $q->where('genre_name', 'like', "%{$query}%");
            })
            ->orWhereHas('publishingHouse', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->get();

        return view('guest.search', compact('books', 'query'));
    }
}
