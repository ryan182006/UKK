<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    //
    public function cost(Request $request)
    {
        $alamat = Alamat::find($request->daftar_alamat_id);
        $keranjang = Keranjang::where('user_id', auth()->user()->id)->with(['barang'])->get();
        $weight = 0;
        foreach ($keranjang as $item) {
            $weight += $item->barang->berat * $item->kuantitas;
        }
        $response = Http::post('https://api.rajaongkir.com/starter/cost', [
            'key' => getenv('RAJA_ONGKIR_API_KEY'),
            'origin' => '444',
            'destination' => '444',
            'weight' => $weight,
            'courier' => $request->courier,
        ]); 
        // $response1 = Http::withHeaders([
        //     'key' => '3aa2d9dd75c3645dabfdf1e8d2eeffae'
        // ])->post('https://api.rajaongkir.com/starter/cost',[
        //     'origin' => '444',
        //     'destination' => '444',
        //     'weight' => $weight,
        //     'courier' => $request->courier,
        // ]);

        return response()->json($response->json()['rajaongkir'], $response->status());
    }
}
