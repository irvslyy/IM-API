<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'Warehouse';
     protected $connection = 'mysql_mplay_stock';
     public $timestamps = false;
}
