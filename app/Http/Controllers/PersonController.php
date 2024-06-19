<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::latest()->paginate(5);
        return view('person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view('person.create');
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
        $request->validate(['email' => 'required']);
        $request->validate(['password' => 'required']);
        $request->validate(['phone' => 'required']);
        $request->validate(['address' => 'required']);
        $request->validate(['image' => 'required']);
        $request->validate(['position' => 'required']);

        $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageFileName);

        Person::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $imageFileName,
                'position' => $request->position


            ]

        );
        return redirect('person')->with('successAlert', 'You have successfully created! ' . $request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('person.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $person = Person::find($id);
        return view('person.edit', compact('person'));
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

        person::find($id)->update([
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
        return redirect('person')->with('successAlert', 'You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Person::find($id)->delete();
        return redirect('person')->with('successAlert', 'You have successfully deleted! ');
    }
}
