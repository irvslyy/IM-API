<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $connection = 'mysql_mplay_history';
    protected $table = 'history_approval';

    public function req()
    {
        return $this->hasMany('App\Req');
    }
}
