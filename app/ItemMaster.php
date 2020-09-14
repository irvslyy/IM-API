<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    protected $table = 'Master_Items';
    protected $connection = 'mysql_mplay_stock';
    public $timestamps = false;

    public function scopeMasterItems($query)
    {
        $query->where('departemen','!=',NULL);
    }

}
