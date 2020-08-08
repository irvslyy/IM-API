<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goodreq extends Model
{
    protected $connection = 'mysql_mplay_logistic';
    protected $table = 'Grf';
    protected $fillable = [
        
        'grf_number',
        'heir_code',
        'employee_number',
        'access_code',
        'status',
        'items_code',
        'TL',
        'SPV',
        'MNG',
        'TL_STATUS',
        'SPV_STATUS',
        'MNG_STATUS'
    ];

    public function item()
    {
        return $this->belongsTo('App\Items','id');
    }
}
