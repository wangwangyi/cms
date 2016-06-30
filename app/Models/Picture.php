<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['title','thumb'];

    public $timestamps = false;
}
