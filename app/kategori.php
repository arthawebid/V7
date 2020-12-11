<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $guarded = ['idkat','created_at','updated_at'];
    public $table = "kategori";
}
