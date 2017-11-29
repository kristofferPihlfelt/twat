<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'photo_id',
        'title',
        'body',
        'meta_title',
        'meta_desc',
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
