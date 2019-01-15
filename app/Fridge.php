<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fridge extends Model
{
    public function groceries ()
    {
        return $this->hasMany(Grocery::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function getGroceriesAttribute($value)
    {
        return array_map(function ($item) {
            return Grocery::find($item);
        }, json_decode($value));
    }
}
