<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FridgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index ()
    {
        $user = Auth::user();
        $fridge = $user->fridge;
        return view('fridge.index', ['items' => $fridge->groceries]);
    }
}
