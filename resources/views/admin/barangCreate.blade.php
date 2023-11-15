@extends('layout.admin')
@section('content')
<div class="flex justify-between">
    <h1 class="text-2xl font-bold mb-4">Tambah Product</h1>
</div>
<div>
    <a href="/barang" class="text-gray-300 hover:text-black">Back</a>
    <form class="" action="/barang" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-4">
            <label for="nama_barang" class="block text-gray-700 font-semibold mb-2">Nama barang</label>
            <input type="text" id="nama_barang" name="nama_barang" class="w-full border border-gray-300 p-2 rounded  @error('nama_barang') is-invalid @enderror" placeholder="Masukkan Nama Barang">
            
            @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-gray-700 font-semibold mb-2">Harga</label>
            <input type="text" id="harga" name="harga" class="w-full border border-gray-300 p-2 rounded  @error('harga') is-invalid @enderror" placeholder="Masukkan Harga">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-semibold mb-2">Stock</label>
            <input type="text" id="stock" name="stock" class="w-full border border-gray-300 p-2 rounded  @error('stock') is-invalid @enderror" placeholder="Masukkan Stock">
            @error('stock')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <input id="gambar" type="file" name="gambar" class="w-full border border-gray-300 p-2 rounded   @error('gambar') is-invalid @enderror" placeholder="Masukkan deskripsi">
            @error('gambar')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Buat Data</button>
        </div>
    </form>
</div>
    

@endsection