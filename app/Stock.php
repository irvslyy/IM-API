<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use Notifiable;

    protected $table = 'Stock';
    protected $connection = 'mysql_mplay_stock';
    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo('App\Items', 'items_code');
    }
}
