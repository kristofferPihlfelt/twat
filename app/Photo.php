<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $userPhotoPath = '/images/users/';

    protected $fillable = [
        'path',
    ];

    public function getPathAttribute($photo) {
        return $this->userPhotoPath . $photo;
    }
}
