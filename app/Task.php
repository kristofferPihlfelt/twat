<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;


class Task extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function assignedTo() {
        return $this->belongsTo('App\User', 'assigned_user_id');
    }

    public function relatedEvent() {
        return $this->belongsTo('App\Event', 'event_id');
    }

    use FormAccessible;


}
