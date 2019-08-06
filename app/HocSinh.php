<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    protected $table = "hocsinh";

    protected $fillable = ['ten', 'toan', 'ly', 'hoa'];

    public $timestamps = false;
}
