<?php

namespace App\Http\Controllers;
use App\Segment;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    public function index()
    {
        $segment = Segment::all();
        return response()->json([
            'status' => 200,
            'data' => $segment
        ]);
    }
}
