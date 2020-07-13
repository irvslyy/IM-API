<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'Stock';
    protected $connection = 'mysql_stock';
    public $timestamps = false;
}
