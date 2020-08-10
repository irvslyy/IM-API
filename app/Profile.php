<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'Profile';
    protected $connection = 'mysql_user_data';
    public $timestamps = false;
    
    public function DataPersonal()
    {
        return $this->belongsTo('App\DataPersonal', 'national_id');
    }
}

