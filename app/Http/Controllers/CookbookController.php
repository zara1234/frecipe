<?php

namespace App\Http\Controllers;

use App\cookbook;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CookbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    
    public function index()
    {
        $recipes = Recipe::all();

        return view('cookbook.index', ['recipes' => $recipes]);

//        $title = ::recipes();
//        return view('cookbook.index', ['name' => $title->name]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return void
     */
    public function show(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('cookbook.show', ['recipe' => $recipe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $user = Auth::user();
        $fridge = $user->fridge;
        $groceries = $fridge->groceries->keyBy('id');

        $recipes = Recipe::all();
        $recipes = $recipes->keyBy('id');

        // wir hauen hier alle Rezepte raus, für die wir nicht alle groceries haben
        foreach ($recipes as $id => $recipe) {
            $ingredientIds = $recipe->ingredients->pluck('id');
            $intersected = $ingredientIds->intersect($groceries->keys());


            // wenn nicht alle benötigten Zutaten vorhanden sind
            if ($intersected->count() !== $recipe->ingredients->count()) {
                $recipes->forget($recipe->id);
            }
        }

        // haben wir auch genug zutaten für die verbliebenen rezepte?
        foreach ($recipes as $id => $recipe) {
            foreach($recipe->ingredients as $ingredient) {
                if (is_int($ingredient->amount)) {
                    $grocery = $groceries->where('id', $ingredient->id)->first();
                    if ($grocery->amount < $ingredient->amount) {
                        $recipes->forget($id);
                    }
                }
            }
        }


        return view('cookbook.index', ['recipes' => $recipes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cookbook  $cookbook
     * @return \Illuminate\Http\Response
     */
    public function edit(cookbook $cookbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cookbook  $cookbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cookbook $cookbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cookbook  $cookbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(cookbook $cookbook)
    {
        //
    }


}
