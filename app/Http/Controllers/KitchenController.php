<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KitchenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index ()
    {
        $user = Auth::user();
        return view('kitchen.index', ['name' => $user->name]);
    }
}
