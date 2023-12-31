<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function guest(){
        return view('beranda',[
            'barangs' => Barang::all()
        ]);
    }

    public function index(){
        $barang = Barang::all();
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();
        return view('content',[
            'barangs' => $barang,
            'jumlah' => $jum_barang

        ]);
    }
}
