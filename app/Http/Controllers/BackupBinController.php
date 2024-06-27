<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\User;
use App\Models\Author;
use App\Models\Genre;
use App\Models\PublishingHouse;
use Illuminate\Support\Facades\Auth;

class BackupBinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Books::latest()->where('deleted', 1)->with(['author', 'genre', 'publishingHouse', 'user'])->paginate(6);
        // // $books = Books::latest()->paginate(5);
        // return view('backup.index', compact('books'));
        $books = Books::onlyTrashed()->paginate(6);

        return view('backup.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $authors = Author::all();
        // $genres = Genre::all();
        // $publishingHouses = PublishingHouse::all();
        // $books = Books::find($id);
        // return view('backup.detail', compact('books', 'genres', 'publishingHouses', 'authors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
        //     'deleted' => 0,
        //     'inserted_by' => auth()->user()->id
        // ]);
        // return redirect('admin/backup')->with('successAlert', 'You have successfully restored! ' . $books->name);

        $books = Books::withTrashed()->find($id);

        if (!$books) {
            return redirect('admin/backup')->with('dangerAlert', 'You have successfully restored! ');
        }

        $books->restore();

        return redirect('admin/backup')->with('successAlert', 'You have successfully restored! ' . $books->name);
    }
}
