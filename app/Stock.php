<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use Notifiable;

    protected $table = 'Stock';
    protected $fillable = ['items_code', 'vendor_code', 'wh_code', 'condition_code', 'storage_code', 'update_date'];

    protected $connection = 'mysql_mplay_stock';
    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo('App\Items', 'items_code');
    }
    public function warehouse()
    {
        return $this->belongsTo('App\Warehouse', 'wh_code');
    }
    public function segment()
    {
        return $this->belongsTo('App\Segment', 'segment_code');
    }

    public function scopestockTrue($query)
    {
        $query->where('wh_code', $req->wh_code)->where('status','like','%True%');
    }

}
