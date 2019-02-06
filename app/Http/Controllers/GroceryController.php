<?php

namespace App\Http\Controllers;

use App\Grocery;
use Illuminate\Http\Request;

class GroceryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request
     *      * @return \Illuminate\Http\Response

     */
    public function backend_groceryShow()
    {
        $groceries = Grocery::all();
        return view('backend/grocery.groceryShow',['groceries'=> $groceries]);

    }

    public function backend_groceryEdit($id){
        $groceries = Grocery::findOrFail($id);
        return view('backend/grocery.groceryEdit',['groceries'=> $groceries]);
    }

    public function backend_groceryEditPost($id, Request $request){
        $groceries = Grocery::findOrFail($id);
        $groceries->unit = $request->get('unit');
        $groceries->name = $request->get('name');
        $groceries->save();

        return view('backend/grocery.groceryEdit',['groceries'=> $groceries]);
    }

    public function backend_groceryCreate(){
        return view('backend/grocery.groceryCreate'/*,['recipes'=> $recipes]*/);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function backend_groceryStore(Request $request)
    {
        $request->validate([
            'name'=> "required|string",
            'unit'=> "required|string",
        ]);

        Grocery::create([
            'name' => $request->get('name'),
            'unit'=> $request->get('unit'),

        ]);
        return redirect('/cp/grocery/show')->with('success', 'Recipe has been added');
    }
}
