<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UnauthorizedPerson extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::orderBy('deleted', 'ASC')->where('deleted', 1)->paginate(10);
        // return view('unauthorized.index', compact('users'));
        $users = User::onlyTrashed()->paginate(10);

        return view('unauthorized.index', compact('users'));
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
        $users = User::find($id);
        return view('unauthorized.detail', compact('users'));
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
        // $user = User::find($id);
        // User::find($id)->update([
        //     'deleted' => 0,
        // ]);
        // return redirect('admin/unauthorized')->with('successAlert', 'You have successfully restored! ' . $user->name);
        $user = User::withTrashed()->find($id);

        if (!$user) {
            return redirect('admin/unauthorized')->with('dangerAlert', 'User not found! ');
        }

        $user->restore();

        return redirect('admin/unauthorized')->with('successAlert', 'You have successfully restored! ' . $user->name);
    } 
}
