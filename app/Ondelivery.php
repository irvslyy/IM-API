<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ondelivery extends Model
{
    protected $connection = 'mysql_logistic';
    protected $table = 'On_delivery';
    protected $fillable = [
        'cod_code',
        'request_code',
        'grf_number',
        'status'
    ];
}
