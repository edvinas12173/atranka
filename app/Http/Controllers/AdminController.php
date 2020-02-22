<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.index')->with('users', $users);
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
        // Required inputs
        $this->validate($request, [
            'role' => 'required',
        ]);

        // Edit role
        $user = User::find($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect('/admin');

    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin');
    }
}
