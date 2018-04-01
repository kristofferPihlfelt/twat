<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventChannel extends Model
{
    protected $fillable = ['name'];

    public function event()
    {
        return $this->belongsToMany('App\Event');
    }

}
