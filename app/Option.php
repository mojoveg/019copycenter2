<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
