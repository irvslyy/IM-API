<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use Notifiable;

    protected $table = 'Stock';
    protected $connection = 'mysql_stock';
    public $timestamps = false;
}
