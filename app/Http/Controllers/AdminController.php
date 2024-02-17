<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Checkout;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $totalPenjualanHariIni = Checkout::whereDate('created_at', Carbon::today())->count();

        // data pesanan 
        $belumDibayar = Checkout::where('payment_status', '1')->get();
        $menungguKonfirmasi = Checkout::where('status', '1')->get();
        $diproses = Checkout::where('status', '2')->get();
        $dikirim = Checkout::where('status', '3')->get();
        $penjualanSelesai = Checkout::withTrashed()->where('status', '4')->get();
        $hasilPenjualan = 0;
        foreach ($penjualanSelesai as $selesai) {
            $hasilPenjualan += $selesai->total;
        }
        
        return view('admin.dashboard',[
            'barangs' => Barang::all(),
            'totalPenjualanHariIni' => $totalPenjualanHariIni,
            'belumDibayar' => $belumDibayar,
            'menungguKonfirmasi' => $menungguKonfirmasi,
            'diproses' => $diproses,
            'dikirim' => $dikirim,
            'penjualanSelesai' => $penjualanSelesai,
            'hasilPenjualan' => $hasilPenjualan,
        ]);
    }
}
