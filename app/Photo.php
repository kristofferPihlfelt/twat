<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $userPhotoPath = '/images/users/';
    protected $postPhotoPath = '/images/posts/';

    protected $fillable = [
        'path',
    ];

    public function getPathAttribute($photo) {
        return $photo;
    }

    public function getPostPhoto($photo) {
        return $this->postPhotoPath . $this->getPathAttribute($photo);
    }

    public function getUserPhoto($photo) {
        return $this->userPhotoPath . $this->getPathAttribute($photo);
    }

}


