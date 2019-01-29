<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function recipeCreate() {
        return view("backend/cookbook.create");
    }

    public function cookbookShow(){

        $recipes = Recipe::all();
        return view('backend/cookbook.cookbookShow',['recipes'=>$recipes]);
    }

    public function cookbookCreate(){

        return view('backend/cookbook.cookbookShow');


    }

    public function destroy($id)
    {
        $todo = Recipe::findOrFail($id);
        Recipe::find($id)->delete();
        return back();

    }

    public function create()
    {
        return view('tasks.create');
    }

}
