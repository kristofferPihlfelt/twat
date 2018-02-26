<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $mediaPath = '/images/';

    protected $fillable = [
        'path',
    ];

    public function getPathAttribute($photo) {
        return $this->mediaPath . $photo;
    }


}


