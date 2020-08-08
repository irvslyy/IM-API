<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPersonal extends Model
{
    protected $table = 'Data_Personal';
    protected $connection = 'mysql_user_data';
    public $timestamps = false;
}
