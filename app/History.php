<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $connection = 'mysql_mplay_history';
    protected $table = 'history_approval';

    public function req()
    {
        return $this->hasMany('App\Req');
    }

    public function scopeHistoryApprove($query)
    {
        $query->where('MNG_STATUS','LIKE','%Approve%');
    }

    public function scopeHistoryData($query)
    {
        $query->where('request_code','!=',NULL);
    }
}
