<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_category_id',
        'event_channel_id',
        'start_date',
        'end_date'
    ];

    public function category()
    {
        return $this->belongsTo('App\EventCategory');
    }

    public function channel()
    {
        return $this->belongsTo('App\EventChannel');
    }

    public function productlist()
    {
        return $this->belongsTo('App\EventProductList');
    }
}
