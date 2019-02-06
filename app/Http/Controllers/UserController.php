<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function backend_userShow(){
        $users = User::all();
        return view('backend/user.userShow',['users'=> $users]);
    }

    public function backend_userDestroy($id)
    {
        $todo = User::findOrFail($id);
        User::find($id)->delete();
        return back();

    }


    public function backend_userEdit(){
        $users = User::findOrFail($id);
        return view('backend/user.userEdit',['users'=> $users]);
    }

    public function userEditPost($id, Request $request){
        $users = User::findOrFail($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->usergroup = $request->get('user_group');
        $users->save();

        return view('backend/user.userEdit',['users'=> $users]);
    }



}
