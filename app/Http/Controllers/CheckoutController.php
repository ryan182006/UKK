<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Barang;
use App\Models\Checkout;
use App\Models\Kecamatan;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $is_tersedia = true;
        $qtyNol = false;
        $keranjangs = Keranjang::where('user_id', auth()->user()->id)->with(['barang', 'user'])->get();
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();
        foreach ($keranjangs as $keranjang) {
            if ($keranjang->kuantitas > $keranjang->barang->stock) {
                $is_tersedia = false;
            }

            if ($keranjang->kuantitas == 0) {
                $qtyNol = true;
            }
        }

        // return 'tes';
        if (!$is_tersedia) {
            return back()->with('error', 'Kuantitas melebihi stok!');
        }

        if ($qtyNol) {
            return back()->with('error', 'Kuantitas Tidak Boleh 0');
        }

        if ($keranjangs->isEmpty()) {
            return back()->with('error', 'Keranjang kosong');
        }
        $total = 0;
        foreach ($keranjangs as $keranjang) {
            $total += $keranjang->subtotal;
        }
        $kecamatans = Kecamatan::all();
        $daftar_alamats = Alamat::where('user_id', auth()->user()->id)->get();
        return view('checkout', [
            'keranjangs' => $keranjangs,
            'total' => $total,
            'daftar_alamats' => $daftar_alamats,
            'kecamatans' => $kecamatans,
            'jumlah' =>$jum_barang,
        ]);
    }

    public function pembayaran(Request $request)
    {
        // return $request->all();
        $keranjangs = Keranjang::where('user_id', auth()->user()->id)->with(['barang', 'user'])->get();
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();
        $total = 0;
        foreach ($keranjangs as $keranjang) {
            $total += $keranjang->subtotal;
        }
        $ongkir = $request->input('ongkir');

        $catatan = $request->catatan;
        $daftar_alamats = Alamat::with(['user'])->find($request->daftar_alamat_id);
        return view('pembayaran', [
            'keranjangs' => $keranjangs,
            'daftar_alamats' => $daftar_alamats,
            'total' => $total,
            'catatan' => $catatan,
            'jumlah' =>$jum_barang,
            'ongkir' => $ongkir
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = auth()->user();

        $orderpanding = Checkout::with(['pesanans','user'])
        ->where('user_id',$user->id)
        ->where('payment_status','1')->get();
        return view('pesananpanding',[
        'orderpanding' =>$orderpanding]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'daftar_alamat_id' => 'required',
            'courier' => 'required',
            'catatan' => 'string|nullable',
            'ongkir' => 'required',
            'estimasi' => 'required',
        ]);

        $keranjangs = Keranjang::where('user_id', auth()->user()->id)->with(['barang', 'user'])->get();

        $total = 0;
        foreach ($keranjangs as $keranjang) {
            $total += $keranjang->subtotal;
        }

        $total += $request->ongkir;

        $input = [
            'user_id' => auth()->user()->id,
            'alamat_id' => $request->daftar_alamat_id,
            'courier' => $request->courier,
            'layanan' => $request->layanan,
            'catatan' => $request->catatan,
            'ongkir' => $request->ongkir,
            'estimasi' => $request->estimasi,
            'total' => $total,
        ];
        $checkout = Checkout::create($input);

        foreach ($keranjangs as $keranjang) {
            $pesanan = Pesanan::create([
                'produk_id' => $keranjang->barang_id,
                'checkout_id' => $checkout->id,
                'kuantitas' => $keranjang->kuantitas,
                'sub_total' => $keranjang->subtotal
            ]);

            $barang = Barang::where('id', $keranjang->barang_id)->first();


            $barang->update([
                'stock' => $barang->stock - $keranjang->kuantitas
            ]);

            Keranjang::destroy($keranjang->id);
        }
        

        $checkout = Checkout::with(['pesanans'])->where('id', $checkout->id)->first();

        $midtrans = new CreateSnapTokenService($checkout);
        
        $snapToken = $midtrans->getSnapToken();

        $checkout->snap_token = $snapToken;
        $checkout->save();

        
        return response()->json([
            'snap_token' => $snapToken,
        ]);
    }

    


    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        $checkout = Checkout::with(['alamats', 'pesanan'])->find($checkout->id);
        $snapToken = $checkout->snap_token;

        return view('DetailPesanan', compact('snapToken', 'checkout'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        
    }
}
