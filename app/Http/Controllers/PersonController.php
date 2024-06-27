<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('deleted', 'ASC')->where('deleted', 0)->paginate(10);
        return view('person.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check if there is a user with the manager position
        $managerExists = User::whereHas('positions', function ($query) {
            $query->where('position_name', 'Manager');
        })->exists();

        // Fetch positions excluding 'Manager' if a manager already exists
        if ($managerExists) {
            $positions = Position::where('position_name', '!=', 'Manager')->get();
        } else {
            $positions = Position::all();
        }




        // $positions = Position::orderBy('position_name', 'ASC')->get();
        return view('person.create', compact('positions'));
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
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/',
            'phone' => 'required|numeric|digits_between:10,15|unique:users,phone',
            'address' => 'required|string|max:255',
            'image' => 'required',
            'position_id' => 'required',

        ]);


        $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageFileName);

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $imageFileName,
                'position_id' => $request->position_id,
                'deleted' => 0,
                'active' => 1
            ]

        );
        return redirect('admin/person')->with('successAlert', 'You have successfully created! ' . $request->name);
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
        return view('person.detail', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = Position::orderBy('position_name', 'ASC')->get();
        $users = User::find($id);
        return view('person.edit', compact('users', 'positions'));
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


            // 'password' => 'required',

            // 'image' => 'required',


            'name' => 'required',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'address' => 'required|string|max:255',

            'position_id' => 'required',

        ]);

        $user = User::find($id);
        $imageFileName = $user->image;
        if ($request->hasFile('image')) {
            $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('images'), $imageFileName);
        }

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request['password']),
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $imageFileName,
            'position_id' => $request->position_id
        ]);
        return redirect('admin/person')->with('successAlert', 'You have successfully updated!');
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
        //     'deleted' => 1,
        // ]);
        // return redirect('admin/person')->with('successAlert', 'You have successfully deleted! ' . $user->name);
        $user = User::find($id);

        if (!$user) {
            return redirect('admin/person')->with('dangerAlert', 'User not found! ');
        }

        $user->delete();

        return redirect('admin/person')->with('successAlert', 'You have successfully deleted! ' . $user->name);
    }
}
