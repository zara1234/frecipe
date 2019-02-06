<?php

namespace App\Http\Controllers;

use App\Fridge;
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
        $user = User::find($id);
        Fridge::find($user->id)->delete();
        $user->delete();
        return back();

    }


    public function backend_userEdit($id){
        $users = User::findOrFail($id);
        return view('backend/user.userEdit',['users'=> $users]);
    }

    public function backend_userEditPost($id, Request $request){
        $users = User::findOrFail($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->user_group = $request->get('user_group');
        $users->save();

        return view('backend/user.userEdit',['users'=> $users]);
    }



}
