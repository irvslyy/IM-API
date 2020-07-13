<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'Shipping';
    protected $connection = 'mysql_logistic';
    public $timestamps = false;
}
