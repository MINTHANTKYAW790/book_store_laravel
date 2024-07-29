<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:position-list|position-create|position-edit|position-delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:position-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:position-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:position-delete'], ['only' => ['destroy']]);
    }
    public function index()
    {
        $positions = Position::latest()->paginate(10);
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['position_name' => 'required']);


        Position::create(
            ['position_name' => $request->position_name]
        );
        return redirect('admin/positions')->with('successAlert', 'You have successfully created! ' . $request->position_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('positions.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = Position::find($id);
        return view('positions.edit', compact('positions'));
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
        $request->validate(['position_name' => 'required']);
        Position::find($id)->update(['position_name' => $request->position_name]);
        return redirect('admin/positions')->with('successAlert', 'You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('positions.delete');
    }
}
