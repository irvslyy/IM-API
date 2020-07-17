<?php

namespace App;
use Laravel\Passport\HasApiTokens; 
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use Notifiable, HasApiTokens; 
    
    protected $table = 'Stock';
    protected $connection = 'mysql_stock';
    public $timestamps = false;
}
