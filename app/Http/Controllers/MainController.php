<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function guest()
    {
        return view('beranda',[
            'barangs' => Barang::paginate(3)
        ]);
            
       
    }

    public function index()
    {
        $barang = Barang::paginate(6);
        $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();
        return view('content', [
            'barangs' => $barang,
            'jumlah' => $jum_barang

        ]);
    }

    // public function toko(Request $request)
    // {
    //     $barangs = Barang::paginate(3);
    //     $jum_barang = Keranjang::where('user_id', auth()->user()->id)->count();
    //     // $search = $request->input('search');
    
    //     //     $barangss = Barang::when($search, function ($query) use ($search) {
    //     //         $query->where('nama_barang', 'like', '%' . $search . '%')
    //     //               ->orWhere('deskripsi', 'like', '%' . $search . '%');
    //     //     })->paginate(10);
    //     //     if ($search && $barangs->isEmpty()) {
    //     //         return redirect()->route('cari')->with('error', 'Product not found.');
    //     //     }

    //     return view('toko', [
    //         'barangs' => $barangs,
    //         'jumlah' => $jum_barang
    //     ]);
    // }

    public function search(Request $request)
    {
        $jumlah = Keranjang::where('user_id', auth()->user()->id)->count();
        $search = $request->input('search');
    
            $barangs = Barang::when($search, function ($query) use ($search) {
                $query->where('nama_barang', 'like', '%' . $search . '%')
                      ->orWhere('deskripsi', 'like', '%' . $search . '%');
            })->paginate(9);
            if ($search && $barangs->isEmpty()) {
                return redirect()->route('cari')->with('error', 'Product not found.');
            }
    
            return view('toko', compact('barangs', 'search','jumlah'));
     
    }
}
