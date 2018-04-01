<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $fillable = ['name'];


    public function event()
    {
        return $this->belongsToMany('App\Event');
    }
}
