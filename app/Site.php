<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;

class Site extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'platform', 'description', 'credentials_user', 'credentials_pass', 'analytics', 'created_at', 'updated_at',
    ];


    use Encryptable;

    protected $encryptable = [
        'credentials_user',
        'credentials_pass',
    ];
}
