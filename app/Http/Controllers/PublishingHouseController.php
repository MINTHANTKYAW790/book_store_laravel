<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublishingHouse;

class PublishingHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:publishing-house-list|publishing-house-create|publishing-house-edit'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:publishing-house-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:publishing-house-edit'], ['only' => ['edit', 'update']]);
    }
    public function index()
    {
        $publishinghouses = PublishingHouse::latest()->paginate(10);
        return view('publishinghouses.index', compact('publishinghouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publishinghouses.create');
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


        PublishingHouse::create(
            ['name' => $request->name]
        );
        return redirect('admin/publishinghouses')->with('successAlert', 'You have successfully created! ' . $request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('publishinghouses.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publishinghouses = PublishingHouse::find($id);
        return view('publishinghouses.edit', compact('publishinghouses'));
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
        $publishinghouses = PublishingHouse::find($id)->update(['name' => $request->name]);
        return redirect('admin/publishinghouses')->with('successAlert', 'You have successfully updated! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('publishinghouses.delete');
    }
}
