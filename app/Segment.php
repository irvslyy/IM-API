<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = 'Segment';
    protected $connection = 'mysql_mplay_stock';
    public $timestamps = false;
}
