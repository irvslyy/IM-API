<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'Shipping';
    protected $connection = 'mysql_mplay_logistic';
    protected $fillable = ['user_id','shipping_number','req_code','grf_number','status'];
}
