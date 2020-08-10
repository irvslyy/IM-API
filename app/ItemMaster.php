<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    protected $table = 'master_items';
    protected $connection = 'mysql_mplay_stock';
    public $timestamps = false;
}
