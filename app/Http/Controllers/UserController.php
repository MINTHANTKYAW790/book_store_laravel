<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:authorized-list|authorized-detail|authorized-create|authorized-edit|authorized-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:authorized-detail'], ['only' => ['show']]);
        $this->middleware(['permission:authorized-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:authorized-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:authorized-delete'], ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $users = User::latest()->paginate(5);
        return view('person.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('person.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required',

            'password' => 'required|string|min:8|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/',
            'phone' => 'required|numeric|digits_between:10,15|unique:users,phone',
            'address' => 'required|string|max:255',
            'image' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if ($request->hasFile('image')) {
            $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('images'), $imageFileName);
            $input['image'] = $imageFileName;  // Save the file name in the database
        }



        $user = User::create($input);

        $user->assignRole($request->input('roles'));

        return redirect()->route('person.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('person.detail', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $users->roles->pluck('name', 'name')->all();

        return view('person.edit', compact('users', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'phone' => 'required|numeric|digits_between:10,15',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        if ($request->hasFile('image')) {
            $imageFileName = auth()->id() . '_' . time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('images'), $imageFileName);
            $input['image'] = $imageFileName;  // Save the file name in the database
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('person.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('admin/person')->with('dangerAlert', 'User not found! ');
        }

        $user->delete();

        return redirect('admin/person')->with('successAlert', 'You have successfully deleted! ' . $user->name);
    }
}
