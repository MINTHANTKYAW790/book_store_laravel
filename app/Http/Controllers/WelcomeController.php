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
        return view('guest.books', compact('books'));
    }
}
