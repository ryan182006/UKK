@extends('layout.admin')
@section('content')
<div class="flex justify-between">
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
</div>
<div>
    <a href="/barang" class="text-gray-300 hover:text-black">Back</a>
    <form class="" action="/barang/{{$barangs->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_barang" class="block text-gray-700 font-semibold mb-2">Nama barang</label>
            <input required type="text" value="{{old('nama_barang', $barangs->nama_barang)}}" id="nama_barang" name="nama_barang" class="w-full border border-gray-300 p-2 rounded  @error('nama_barang') is-invalid @enderror" placeholder="Masukkan Nama Barang">
            
            @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskrips</label>
            <input  type="text" value="{{old('deskripsi', $barangs->deskripsi)}}" id="deskripsi" name="deskripsi" class="w-full border border-gray-300 p-2 rounded  @error('deskripsi') is-invalid @enderror" placeholder="Masukkan Deskripsi Barang">
            
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-gray-700 font-semibold mb-2">Harga</label>
            <input required type="number" value="{{old('harga', $barangs->harga)}}" id="harga" name="harga" class="w-full border border-gray-300 p-2 rounded  @error('harga') is-invalid @enderror" placeholder="Masukkan Harga">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="berat" class="block text-gray-700 font-semibold mb-2">Berat</label>
            <input required type="number" value="{{old('berat', $barangs->berat)}}" id="berat" name="berat" class="w-full border border-gray-300 p-2 rounded  @error('berat') is-invalid @enderror" placeholder="Masukkan Berat">
            @error('berat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-semibold mb-2">Stock</label>
            <input type="number" value="{{old('stock', $barangs->stock)}}" id="stock" name="stock" class="w-full border border-gray-300 p-2 rounded  @error('stock') is-invalid @enderror" placeholder="Masukkan Stock">
            @error('stock')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="form-label">Gambar</label>
            <input type="hidden" name="oldImage" value="{{$barangs->gambar}}">
            @if($barangs->gambar)
            <img src="{{asset('storage/'.$barangs->gambar)}}" class="img-preview img-fluid h-[200px] my-3">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control  @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
            @error('gambar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Rubah Data</button>
        </div>
    </form>
</div>
    

@endsection