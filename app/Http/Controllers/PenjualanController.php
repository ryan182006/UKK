<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function cetakPdf(Request $request)
    {
        // return $request;
        if (strpos($request->timestamp, ' to ')) {
            $tanggal = explode(' to ', $request->timestamp);
            $start = Carbon::parse($tanggal[0])->format('Y-m-d');
            $akhir = Carbon::parse($tanggal[1])->format('Y-m-d');
            $penjualans = Checkout::withTrashed()->with(['alamat', 'pesanans'])->where('status', '4')->whereBetween('created_at', [$start, $akhir])->get();
        } else {
            $start = Carbon::parse($request->timestamp)->format('Y-m-d');
            $akhir = $start;
            $penjualans = Checkout::withTrashed()->with(['alamat', 'pesanans'])->where('status', '4')->where('created_at', 'LIKE', '%' . $start . '%')->get();
        }

        $total = 0;
        foreach ($penjualans as $penjualan) {
            $total += $penjualan->total;
        }

        // dd($total);

        // dd($penjualans);

        $pdf = FacadePdf::loadView('admin.HasilPenjualan', [
            'penjualans' => $penjualans,
            'start' => $start,
            'akhir' => $akhir,
            'total' => $total,
        ]);

        return $pdf->download('PenjualanSayur/' . $start . '-' . $akhir . '.pdf');
    }
}
