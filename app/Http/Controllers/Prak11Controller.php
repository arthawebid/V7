<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\kategori;
use App\produks;

class Prak11Controller extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan daftar Data dari tabel produk
        $KData = produks::get();
        $JRek = produks::count();
        return view('praktikum11.index',compact('KData','JRek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan form untuk Input data produk view create
        //membaca data kategori
        $KData = kategori::get();
        return view('praktikum11.create',compact('KData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //memproses data baru dari form create
        $msg = [
            'required' => 'wajib diisi',
            'numeric' => 'di isi dengan data Number'
        ];
        $aturan= [
            'txProduk' => 'required',
            'txHrgBeli' => 'required|numeric',
            'txHrgJual' => 'required|numeric',
            'txQTY' => 'required|numeric',
            'txKategori' => 'required|numeric',
        ];
        $this->validate($request,$aturan,$msg);

        produks::create([
            'namaproduk'=> $request->txProduk,
            'harga_beli'=>$request->txHrgBeli,
            'harga_jual'=> $request->txHrgJual,
            'qty'=>$request->txQTY,
            'id_kat'=> $request->txKategori,
        ]);

        return redirect()->route('prak11.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan data berdasarkan pencarian namaproduk dalam $id
        $kreteria = "%".$id."%";
        $KData = produks::where("namaproduk",'like',$kreteria)->get();
        $JRek = produks::where("namaproduk",$kreteria)->count();
        return view('praktikum11.index',compact('KData','JRek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*
    [
        ["Element", "green", { role: "style" } ],
        ["Copper", 8.94, "green"],
        ["Silver", 10.49, "green"],
        ["Gold", 19.30, "green"],
        ["Platinum", 21.45, "green"]
    ]
    */
    public function chartProdperJns(){
        $Kgrp = kategori::get();
        $rl = array("role"=>"Blue");
        $a = array("Element", "TotProd",$rl);
        $dta = array($a);

        foreach ($Kgrp as $i => $v) {
            $prd = produks::where('id_kat',$v->idkat)->get();
            $jml = 0;
            foreach ($prd as $ix => $vx){
                $jml += $vx->qty;
            }
            array_push($dta,array($v->kategori,$jml,"yellow"));
        }
        return view('praktikum11.graph')
            ->with('JUDULGRAFIK',"Produk Per kategori")
            ->with('DTA',json_encode($dta));
    }
}
