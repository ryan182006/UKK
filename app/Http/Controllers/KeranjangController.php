<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keranjangs = Keranjang::where('user_id', auth()->user()->id)->with(['barang'])->get();
        $total = 0;
        foreach ($keranjangs as $keranjang) {
            $total += $keranjang->subtotal;
        }
        return view('cart', [
            'keranjangs' => $keranjangs,
            'total' => $total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function addToCart(Request $request, Barang $barang)
    {
        $request->validate([
            'type' => 'string|in:many,single',
        ]);

        $barang = Barang::findOrFail($barang->id);
        


        $keranjang = Keranjang::where('barang_id', $barang->id)->where('user_id', auth()->user()->id)->first();
        
        if ($request->type == "single") {
            if ($request->kuantitas == null || $request->kuantitas == 0) {
                return back()->with('error', 'Kuantitas tidak boleh 0');
            } else {
                if ($keranjang) {
                    $keranjang->update([
                        'kuantitas' => $keranjang->kuantitas + $request->kuantitas
                    ]);
                    return back()->with('success', 'Berhasil menambahkan ke keranjang');
                } else {
                    Keranjang::create([
                        'barang_id' => $barang->id,
                        'kuantitas' => $request->kuantitas,
                        'user_id' => auth()->user()->id
                    ]);
                    
                    return back()->with('success', 'Berhasil menambahkan ke keranjang');
                }
            }
        } else if ($request->type == "many") {
            if ($keranjang) {
                $keranjang->update([
                    'kuantitas' => $keranjang->kuantitas + 1
                ]);
                return back()->with('success', 'Berhasil menambahkan ke keranjang');
            } else {
                Keranjang::create([
                    'barang_id' => $barang->id,
                    'kuantitas' => '1',
                    'user_id' => auth()->user()->id
                ]);
                return back()->with('success', 'Berhasil menambahkan ke keranjang');
            }
        }
        
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang)
    {
        //
        $hapusBarang = Keranjang::findOrFail($keranjang->id);
        $hapusBarang->delete();
        return back()->with('success', 'Berhasil menghapus barang dari keranjang');
    }
}
