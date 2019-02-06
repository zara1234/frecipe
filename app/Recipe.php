<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ["name", "ingredients", "preparation","image"];
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

    public function setIngredientsAttribute ($value)
    {
        $ingredients = [];
        foreach ($value as $ingredient) {
            $ingredients[$ingredient->id] = $ingredient->amount;
        }

        $this->attributes['ingredients'] = json_encode($ingredients);
    }

    public function getPreparationAttribute ($value)
    {
        $decoded = (array)json_decode($value);

        return collect($decoded);
    }

    public function getPreparationStringAttribute ()
    {
        $string = [];
        foreach ($this->preparation as $step) {
            $string[] = "+ {$step}\r";
        }
        return implode('', $string);
    }

    public function setPreparationAttribute (string $value)
    {
        $valueArray = explode("\n", $value);

        $valueArray = array_map(function ($value) {
            $value = ltrim($value, '+');
            return trim($value);
        }, $valueArray);

        $this->attributes['preparation'] = json_encode($valueArray);
    }
}
