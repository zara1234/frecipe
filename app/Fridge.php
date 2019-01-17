<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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
        $decoded = (array)json_decode($value);
        $groceries = [];

        foreach ($decoded as $id => $amount) {
            $item = Grocery::find($id);
            $item->amount = $amount;
            array_push($groceries, $item);
        }

        return collect($groceries);
    }

    public function setGroceriesAttribute(Collection $groceries) {
        $data = [];

        foreach ($groceries as $grocery) {
            $data[$grocery->id] = $grocery->amount;
        }

        $data = json_encode($data);

        $this->attributes['groceries'] = $data;
    }
}
