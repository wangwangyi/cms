<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;
class CacheController extends CommonController
{
    function clear_cache()
    {
        Cache::flush();
        return back()->with('msg', '缓存清除成功~');
    }
}