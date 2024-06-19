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
        $books = Books::latest()->with(['author', 'genre', 'publishingHouse'])->paginate(6);
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
        $books = Books::latest()->with(['author', 'genre', 'publishingHouse'])->paginate(10);
        // $books = Books::latest()->paginate(5);
        return view('guest.books', compact('books'));
    }
    public function authors()
    {
        $authors = Author::latest()->with(['books'])->paginate(10);
        return view('guest.authors', compact('authors'));
    }
}
