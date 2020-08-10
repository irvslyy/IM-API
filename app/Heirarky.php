<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heirarky extends Model
{
    protected $table = 'Heirarky';
    protected $connection = 'mysql_mplay_heirarky';
    public $timestamps = false;


    public function Profile()
    {
        return $this->belongsTo('App\Profile', 'profile_code');
    }
}
