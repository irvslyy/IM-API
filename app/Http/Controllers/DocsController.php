<?php

namespace App\Http\Controllers;
use Spatie\UrlSigner\MD5UrlSigner;      
use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function EFAB_API()
    {
        # code...
    }

    public function IM_API()
    {
        return view('im');
    }
}
