<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.barang',[
            'barangs' => Barang::all(),
        ]);
    }

    public function search(Request $request)
{
	$search = $request->input('search');

        $barangs = Barang::when($search, function ($query) use ($search) {
            $query->where('nama_barang', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
        })->paginate(10);
        if ($search && $barangs->isEmpty()) {
            return redirect()->route('cari')->with('error', 'Product not found.');
        }

        return view('admin.barang', compact('barangs', 'search',));
 
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barangCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|max:255',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            'berat' => 'required',
            'gambar' => 'required|image|file',
        ]);
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(Strip_tags($request->body), 200);

        Barang::create($validatedData);

        return redirect('/barang')->with('pesan', 'Post berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('admin.barangEdit',[
            'barangs' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
        $rules = [
            'nama_barang' => 'required|max:255',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            'berat'=>'required',
            'gambar' => 'image|file',
        ];
        
        // if ($request->kategori != $barang->kategori) {
        //     $rules['kategori'] = 'required|unique:barangs';
        // }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(Strip_tags($request->body), 200);

        Barang::where('id', $barang->id)
            ->update($validatedData);

        return redirect('/barang')->with('pesan', 'Post berhasil di Update');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
        if($barang->gambar){
            Storage::delete($barang->gambar);
        }

        Barang::destroy($barang->id);
        return redirect('/barang')->with('pesan', 'Post berhasil di hapus');
    }
}
