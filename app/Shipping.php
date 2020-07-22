<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'Shipping';
    protected $connection = 'mysql_mplay_logistic';
    public $timestamps = false;
}
