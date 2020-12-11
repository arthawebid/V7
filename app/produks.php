<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class produks extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    public $table = "produks";
}
