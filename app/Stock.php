<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'Stock';
    protected $connection = 'mysql_stock';
    public $timestamps = false;


    public function item()
    {
        return $this->belongsTo('App\Items', 'items_code');
    }
}
