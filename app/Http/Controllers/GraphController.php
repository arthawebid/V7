<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\kategori;

class GraphController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/prak11');
    }
    public function ProdperKat($id){
    }
}
