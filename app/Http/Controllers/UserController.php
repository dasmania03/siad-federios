<?php

namespace Siad\Http\Controllers;

use Siad\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('users.list-users', compact('data'));
    }

    public function create()
    {
        return view('users.create-user');
    }

    public function store(Request $request)
    {
        User::create([
            'username' => $request->get('username'),
            'first_name' => $request->get('f_name'),
            'last_name' => $request->get('l_name'),
            'avatar' => 'male.png',
            'email' => $request->get('email'),
            'password' => bcrypt('user1234'),
            'role' => $request->get('role')
        ]);

        return [
            'status' => true,
            'message' => 'Usuario creado correctamente'
        ];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.create-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->get('f_name');
        $user->last_name = $request->get('l_name');
        $user->avatar = 'male.png';
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->save();

        return [
            'status' => true,
            'message' => 'Usuario modificado correctamente'
        ];
    }

    public function destroy($id)
    {
        //
    }
}
