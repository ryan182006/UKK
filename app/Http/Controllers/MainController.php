<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function guest()
    {
        return view('beranda', [
            'barangs' => Barang::paginate(3)
        ]);
    }

    public function index()
    {
        $barang = Barang::paginate(8);
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();
        return view('content', [
            'barangs' => $barang,
            'jumlah' => $jum_barang

        ]);
    }

    public function toko()
    {
        $barangs = Barang::paginate(3);
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();

        return view('toko', [
            'barangs' => $barangs,
            'jumlah' => $jum_barang
        ]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
    }
}
