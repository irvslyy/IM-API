<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

    public function ApiWarehouse($regional)
    {
        $wh = Warehouse::where('regional', $regional)->get();
        return ['status' => 200, 'data' => $wh];
    }
}
