<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
class Category extends Model
{
    protected $fillable = ['name','is_show'];

    public $timestamps = false;
    static function get_categories()
    {
        $categories = Cache::rememberForever('admin_category_categories', function () {
            return self::get();
        });
        return $categories;
    }

    static function clear()
    {
        Cache::forget('admin_category_categories');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
