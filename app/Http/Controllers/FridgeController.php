<?php

namespace App\Http\Controllers;

use App\Fridge;
use App\Grocery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FridgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $user = Auth::user();
        $fridge = $user->fridge;



        if (is_null($fridge) || $fridge->groceries->isEmpty()) {
            return view('fridge.index', ['items' => []]);

        }
        $grocery = Grocery::get();
        return view('fridge.index', ['items' => $fridge->groceries, "groceries" => $grocery]);
    }

    public function addItem()
    {
        $grocery = Grocery::get();
        return view('fridge.addItem', ["groceries" => $grocery]);
    }

    public function postAddItem(Request $request)
    {
        $user = Auth::user();
        $fridge = $user->fridge;
        $groceries = null;
        $ids_of_frige_content = null;

        $groceries = $fridge->groceries;
        $ids_of_frige_content = $groceries->pluck('id');


        $newGroceryId = $request->all()['item_id'];
        $newGroceryAmount = $request->all()['amount'];

        if ($ids_of_frige_content->contains($newGroceryId)) {
            $groceryToAddTo = $groceries->where('id', $newGroceryId)->first();
            $groceryToAddTo->amount = $groceryToAddTo->amount + $newGroceryAmount;
        } else {
            $newGrocery = Grocery::find($newGroceryId);
            $newGrocery->amount = $newGroceryAmount;
            $groceries->push($newGrocery);
        }

        $fridge->groceries = $groceries;
        $fridge->save();

        return redirect()->route('cookbookEdit');
    }

    public function postChangeItem(Request $request)
    {
        $user = Auth::user();
        $fridge = $user->fridge;

        $groceries = $fridge->groceries;

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

        $fridge->groceries = $groceries;
        $fridge->save();

        return redirect()->route('fridge.index');
    }


}

