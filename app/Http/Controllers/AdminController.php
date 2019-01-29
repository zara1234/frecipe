<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function recipeCreate() {
        return view("backend/cookbook/backendOverview");
    }



}
