@extends('layout.admin')
@section('content')
<div class="flex justify-between ">
    <h1 class="text-2xl font-bold mb-4">Tambah Product</h1>
</div>
<div class="">
    <a href="/barang" class="text-gray-300 hover:text-black"><svg class="w-6 h-6 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
      </svg></a>
    <form class="" action="/barang" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-4">
            <label for="nama_barang" class="block text-gray-700 font-semibold my-2">Nama barang</label>
            <input type="text" id="nama_barang" name="nama_barang" class="w-full border border-gray-300 p-2 rounded  @error('nama_barang') is-invalid @enderror" placeholder="Masukkan Nama Barang">
            
            @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 font-semibold my-2">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" class="w-full border border-gray-300 p-2 rounded  @error('deskripsi') is-invalid @enderror" placeholder="Masukkan Deskripsi Barang">
            
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-gray-700 font-semibold mb-2">Harga</label>
            <input type="number" id="harga" name="harga" class="w-full border border-gray-300 p-2 rounded  @error('harga') is-invalid @enderror" placeholder="Masukkan Harga">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-gray-700 font-semibold mb-2">Stock</label>
            <input type="number" id="stock" name="stock" class="w-full border border-gray-300 p-2 rounded  @error('stock') is-invalid @enderror" placeholder="Masukkan Stock">
            @error('stock')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 font-semibold mb-2">Gambar</label>
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