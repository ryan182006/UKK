<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Checkout;
use App\Models\Keranjang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();
        $checkouts = Checkout::where('user_id', auth()->user()->id)->with(['alamat', 'user', 'pesanans'])->orderBy('payment_status', 'ASC')->get();
        return view('pesanan', [
            'jumlah' => $jum_barang,
            'checkouts' => $checkouts,
        ]);
    }

    public function detailPesanan(Checkout $checkout)
    {
        $checkout = Checkout::where('id', $checkout->id)->with(['alamat', 'user', 'pesanans'])->first();
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();

        return view('DetailPesanan', [
            'checkout' => $checkout,
            'jumlah' => $jum_barang,
        ]);
    }

    public function belumDibayar()
    {
        $checkouts = Checkout::where('payment_status', '1')->latest()->get();
        return view('PesananBelumbayar', [
            'checkouts' => $checkouts
        ]);
    }
    public function menungguKonfirmasi()
    {
        $checkouts = Checkout::where('status', '1')->latest()->get();
        return view('admin.MenungguKonfirmasi', [
            'checkouts' => $checkouts
        ]);
    }
    public function diproses()
    {
        $checkouts = Checkout::where('status', '2')->latest()->get();
        return view('admin.DiProses', [
            'checkouts' => $checkouts
        ]);
    }
    public function dikirim()
    {
        $checkouts = Checkout::where('status', '3')->latest()->get();
        return view('admin.DiKirim', [
            'checkouts' => $checkouts
        ]);
    }
    public function selesai()
    {
        $checkouts = Checkout::withTrashed()->where('status', '4')->latest()->get();
        return view('admin.PesananSelesai', [
            'checkouts' => $checkouts,
        ]);
    }
    public function dibatalkan()
    {
        $checkouts = Checkout::withTrashed()->where('status', '5')->latest()->get();
        return view('admin.PesananDiBatalkan', [
            'checkouts' => $checkouts,
        ]);
    }

    public function detailPesananAdmin(Checkout $checkout)
    {
        $checkout = Checkout::where('id', $checkout->id)->with(['alamat', 'user', 'pesanans'])->first();

        return view('DetailPesanansAdmin', [
            'checkout' => $checkout,
        ]);
    }


    public function changeStatus(Request $request, Checkout $checkout)
    {
        // return $request;

        $checkout = Checkout::where('id', $checkout->id)->first();

        if ($request->action == 'batal') {
            $checkout->update([
                'status' => '5',
            ]);
            return back()->with('success', 'Pesanan berhasil dibatalkan');
        } else if ($request->action == 'terima') {
            $checkout->update([
                'status' => '4',
            ]);
            return back()->with('success', 'Pesanan Telah diterima');
        } else if ($request->action == 'hapus') {
            $checkout->delete();
            return back()->with('success', 'Pesanan berhasil dihapus');
        } else if ($request->action == 'konfirmasi') {
            $checkout->update([
                'status' => '2',
            ]);
            return back()->with('success', 'Pesanan berhasil dikonfirmasi');
        } else if ($request->action == 'kirim') {
            $checkout->update([
                'status' => '3',
            ]);
            return back()->with('success', 'Pesanan berhasil dikirim');
        }
    }
}
