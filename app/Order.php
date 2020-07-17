<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function orderOptions()
    {
        return $this->hasMany('App\orderOption');
    }

    public function path()
    {
        return route('orders.show');
    }
}
