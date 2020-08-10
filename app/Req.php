<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    protected $connection = 'mysql_mplay_logistic';

    protected $table = 'Request';
    protected $fillable = [        
        'id',
        'request_code',
        'request_list',
        'stock_code',
        'items_code',
        'wh_code',
        'product_code',
        'product_name',
        'qty',
        'status',
        'disaster_reason',
        'TL',
        'SPV',
        'MNG',
        'TL_STATUS',
        'SPV_STATUS',
        'MNG_STATUS'
    ];
    public function goodreq()
    {
        return $this->belongsTo('App\GoodReq','id');
    }
    public function itemmaster()
    {
        return $this->belongsTo('App\ItemMaster','id');
    }
}
