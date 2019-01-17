<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function getIngredientsAttribute($value)
    {
        $decoded = (array)json_decode($value);
        $ingredients = [];

        foreach ($decoded as $id => $amount) {
            $item = Grocery::find($id);
            $item->amount = $amount;
            array_push($ingredients, $item);
        }

        return collect($ingredients);
    }

    public function getPreparationAttribute($value) {
        return json_decode($value);
    }
}
