<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware(['permission:authorized-list|authorized-detail|authorized-create|authorized-edit|authorized-delete'], ['only' => ['index', 'show']]);
    //     $this->middleware(['permission:authorized-detail'], ['only' => ['show']]);
    //     $this->middleware(['permission:authorized-create'], ['only' => ['create', 'store']]);
    //     $this->middleware(['permission:authorized-edit'], ['only' => ['edit', 'update']]);
    //     $this->middleware(['permission:authorized-delete'], ['only' => ['destroy']]);
    // }

    public function index()
    {

        $users = User::orderBy('deleted', 'ASC')->where('deleted', 0)->paginate(10);
        $roles = Role::pluck('name', 'name')->all();
        return view('person.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check if there is a user with the manager position
        // $managerExists = User::whereHas('positions', function ($query) {
        //     $query->where('position_name', 'Manager');
        // })->exists();

        // // Fetch positions excluding 'Manager' if a manager already exists
        // if ($managerExists) {
        //     $positions = Position::where('position_name', '!=', 'Manager')->get();
        // } else {
        //     $positions = Position::all();
        // }
        $roles = Role::pluck('name', 'name')->all();
        // $positions = Position::orderBy('position_name', 'ASC')->get();
        return view('person.create', compact('roles'));
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
            'roles' => 'required',

        ]);


        $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('images'), $imageFileName);

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $imageFileName,
                'role' => $request->role,
                'position_id' => 1,
                'deleted' => 0,
                'active' => 1
            ]

        );
        $user->assignRole($request->input('roles'));
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
        $users = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $users->roles->pluck('name', 'name')->all();
        return view('person.edit', compact('users', 'roles', 'userRole'));



        // $positions = Position::orderBy('position_name', 'ASC')->get();
        // $users = User::find($id);
        // $roles = Role::pluck('name', 'name')->all();
        // return view('person.edit', compact('users', 'positions', 'roles'));
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

            'roles' => 'required',

        ]);

        $user = User::find($id);
        $imageFileName = $user->image;
        if ($request->hasFile('image')) {
            $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('images'), $imageFileName);
        }

        $user =  User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request['password']),
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $imageFileName,

        ]);


        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
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
