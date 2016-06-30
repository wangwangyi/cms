<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    function __construct()
    {
        $admin = \Auth::user();
        $time = date("Y",time());
        /*$company = System::find(1);*/
        view()->share([
            'admin' => $admin,
            'time' => $time,
          /*  'company' => $company,*/
        ]);

    }
}
