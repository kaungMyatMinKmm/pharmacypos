<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // die();
        // $request->validate([
        //     'name'=> 'required|min:3|max:191',
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);


        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $role = Role::select('id')->where('name','store')->first();
        $user->roles()->attach($role);

        $user->save();

        

        // dd($user->password);
        // die();

        // if () {
        //     $request->session()->flash('success', $user->name . 'has been updated');
        // } else {
        //     $request->session()->flash('error', 'There was an error updating the user');
        // }

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {   
        if (Gate::denies('crud')) {
            return redirect()->route('admin.users.index');
        }

        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', compact("user","roles"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>'required|min:3|max:191',
            'email'=> ['required', 'string', 'email', 'max:255'],
            'roles'=> ['required']
        ]);

        $user= User::find($id);
        $user->roles()->sync($request->roles);
        $user->name = request('name');
        $user->email = request('email');


        if ($user->save()) {
            $request->session()->flash('success', $user->name . 'has been updated');
        } else {
            $request->session()->flash('error', 'There was an error updating the user');
        }
        

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //

        if (Gate::denies('crud')) {
            return redirect()->route('admin.users.index');
        }
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
