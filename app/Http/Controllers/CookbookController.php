<?php

namespace App\Http\Controllers;

use App\cookbook;
use App\Grocery;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Cache\ItemInterface;

class CookbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct(){
        $this->middleware('auth:web');
    }


    public function index()
    {
        $recipes = Recipe::all();
        $preparation = [];
        foreach ($recipes as $key => $value):
                $preparation[$key] = $value["preparation"];
        endforeach;

        return view('cookbook.index', ['recipes' => $recipes, 'preparation' => $preparation]);


//        return view('cookbook.index',['name'=>$recipes->name ]);

//        $title = Auth::recipes();
//        return view('cookbook.index', ['name' => $title->name]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/cookbook.cookbookEdit');
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
     *      * @return \Illuminate\Http\Response

     */
    public function show(Request $request, $id)
    {
        $recipes = Recipe::findOrFail($id);

        return view('cookbook.show', ['recipe' => $recipes]);
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
//        dd($recipes);


        return view('cookbook.index', ['recipes' => $recipes]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cookbook  $cookbook
     * @return \Illuminate\Http\Response
     */
    public function backend_edit(cookbook $cookbook)
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
    public function backend_update(Request $request, cookbook $cookbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cookbook  $cookbook
     * @return \Illuminate\Http\Response
     */


    public function backend_cookbookShow(){

        $recipes = Recipe::all();
        return view('backend/cookbook.cookbookShow',['recipes'=> $recipes]);
    }

    public function backend_cookbookCreate(){
        $recipes = Recipe::all();
        $grocery = Grocery::all();
        return view('backend/cookbook.cookbookCreate',['recipes'=> $recipes, 'grocery' => $grocery]);
    }

    public function backend_cookbookCreateStore(Request $request){
        $request->validate([
            'name'=> "required|string",
            'preparation'=> "required|string",
            'image'=> "required",

        ]);


        $file = Storage::disk("public")->putFile("recipe_images", $request->file("image"), "public");

        $preparation = str_replace(array("\r", "\n"), "", $request->get("preparation"));
        $preparation = explode("+", $preparation);

//      dd($request->get("ingredients"));

        $recipe = Recipe::create([
            'name' => $request->get('name'),
            'preparation'=> $request->get('preparation'),
            'image'=> basename($file),

        ]);

        $ingredients_fin = $recipe->ingredients;
        $ingredients = json_decode($request->ingredients, true);

        foreach($ingredients as $id => $unit) {
            $groceryToAddTo = Grocery::find($id);
            $groceryToAddTo->amount = $unit;
            $ingredients_fin->push($groceryToAddTo);

        }

        $recipe->ingredients = $ingredients_fin;
        $recipe->save();


        return redirect('/cp/cookbook/show')->with('success', 'Recipe has been added');
    }



    public function backend_cookbookEdit($id){
        $recipe = Recipe::findOrFail($id);
        return view('backend/cookbook.cookbookEdit',['recipe'=> $recipe]);
    }

    public function backend_cookbookEditPost($id, Request $request){
        $recipe = Recipe::findOrFail($id);
        if($recipe->image !== "" && $request->file("image") !== null) {
            $file = Storage::disk("public")->putFile("recipe_images/", $request->file("image"), "public");
            $filename = basename($file);
            $recipe->image = $filename;
        }
        $recipe->preparation = $request->get('preparation');
        $recipe->name = $request->get('name');
        $recipe->save();

        return view('backend/cookbook.cookbookEdit',['recipe'=> $recipe]);
    }

    public function backend_cookbookEditChangeItem(Request $request){
        dd($request->all());
        return view('backend/cookbook.cookbookChangeItem',['recipe'=> $recipe, 'item' => $item]);
    }

    public function backend_destroy($id)
    {
        $todo = Recipe::findOrFail($id);
        Recipe::find($id)->delete();
        return back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function backend_cookbookStore(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'ingredients'=> 'required',
            'preparation' => 'required'
        ]);
        Recipe::create([
            'title' => $request->get('title'),
            'ingredients'=> $request->get('ingredients'),
            'preparation'=> $request->get('preparation')
        ]);

        return redirect('/cp/recipe/create')->with('success', 'Recipe has been added');
    }

    public function backend_AddItem($id){
        $grocery = Grocery::get();
        $recipe = Recipe::findOrFail($id);
        return view('backend.cookbook.cookbookEditIngredients', ["groceries" => $grocery, "recipe" => $recipe]);
    }

    public function backend_postAddItem($id, Request $request)
    {
        $recipe = Recipe::findOrFail($id);
        $ingredients = $recipe->ingredients;
        $ids_of_recipe_content = $ingredients->pluck('id');

        $newGroceryId = $request->all()['item_id'];
        $newGroceryAmount = $request->all()['amount'];

        if ($ids_of_recipe_content->contains($newGroceryId)) {
            $groceryToAddTo = $ingredients->where('id', $newGroceryId)->first();
            $groceryToAddTo->amount = $groceryToAddTo->amount + $newGroceryAmount;
        } else {
            $newGrocery = Grocery::find($newGroceryId);
            $newGrocery->amount = $newGroceryAmount;
            $ingredients->push($newGrocery);
        }

        $recipe->ingredients = $ingredients;
        $recipe->save();

        return redirect()->route('cp.cookbookEdit', ['id'=>$recipe]);
    }

    public function backend_postChangeItem($id, Request $request)
    {
        dump($request->all());
        $recipe = Recipe::findOrFail($id);

        $groceries = $recipe->ingredients;

        $newGroceryId = $request->all()['item_id'];
        $newGroceryAmount = $request->all()['amount'];

        if ($newGroceryAmount <= 0) {
            $keyed = $groceries->keyBy('id');
            $keyed->forget($newGroceryId);
            $groceries = $keyed;
        } else {
            $groceryToAddTo = $groceries->where('id', $newGroceryId)->first();
            $groceryToAddTo->amount = $newGroceryAmount;
        }


        $recipe->ingredients = $groceries;
        $recipe->save();

        return redirect()->route('cp.cookbookEdit', ['id'=>$recipe]);
    }

}
