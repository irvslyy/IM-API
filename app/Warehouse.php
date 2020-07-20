<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'Warehouse';
     protected $connection = 'mysql_stock';
     public $timestamps = false;
}
