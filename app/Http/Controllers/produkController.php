<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produkController extends Controller
{
    //property INDEX
    public function index(){
        $isi = "Ini merupakan sebuah controller dengan propery index";
        return $isi;
    }
}
