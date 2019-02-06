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


//    public function backend_userShow(){
//        $users = User::all();
//        return view('cp.backend/user.userShow',['user'=> $users, 'name']);
//    }
//
//
//    public function backend_userShow(Request $request, $id)
//    {
//        $users = User::findOrFail($id);
//
//        return view('cp.user.show', ['recipe' => $recipes]);
//    }



}
