@extends('layout.Main')
@section('content')
    <div class="container mx-auto">
        <a href="{{ route('beranda') }}"><button
                class="text-xl font-bold mb-4 bg-stone-500 p-2 rounded-lg text-white">Back</button></a>
        <h1 class="text-4xl font-bold mb-4">Shopping Cart</h1>
        <table class="block md:table w-full rounded-lg  bg-white">
            <thead class="block md:table-header-group ">
                <tr class="md:table-row">
                    <th class="text-left md:table-cell p-2">Gambar Product</th>
                    <th class="text-left md:table-cell p-2">Nama Product</th>
                    <th class="text-left md:table-cell p-2">Deskripsi Berat</th>
                    <th class="text-left md:table-cell p-2">Price</th>
                    <th class="text-left md:table-cell p-2">Quantity</th>
                    <th class="text-left md:table-cell p-2">Remove</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @foreach ($keranjangs as $keranjang)
                    <tr class="block md:table-row">
                        <td class="text-left md:table-cell p-2 h-[50px]">
                            <div class="text-sm text-gray-900 ">
                                <img src="{{ asset('storage/' . $keranjang->barang->gambar) }}" alt=""
                                    class="h-[60px]">
                            </div>
                        </td>
                        <td class="text-left md:table-cell p-2">
                            <div class="text-sm text-gray-900">{{ $keranjang->barang->nama_barang }}</div>
                        </td>
                        <td class="text-left md:table-cell p-2">
                            <div class="text-sm text-gray-900">{{ $keranjang->barang->deskripsi }}</div>
                        </td>
                        <td class="text-left md:table-cell p-2">
                            <div class="text-sm text-gray-900">{{ $keranjang->barang->harga }}</div>
                        </td>
                        <td class="text-left md:table-cell p-2">
                            <div class="text-sm text-gray-900">
                                <form action="/cart/update/{{ $keranjang->barang->id }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="number" min="0" max="{{ $keranjang->barang->stock }}"
                                        name="kuantitas" class="kuantitas col-lg-6" id="kuantitas"
                                        data-id="{{ $keranjang->id }}" value="{{ $keranjang->kuantitas }}">
                                </form>
                            </div>
                        </td>
                        <td class="text-left md:table-cell p-2">
                            <button class="text-red-600 hover:text-red-900">Remove</button>
                        </td>
                    </tr>
                @endforeach
                <!-- More Product Items -->
            </tbody>
        </table>

        <!-- Subtotal Table -->
        <div class="bg-white p-4 rounded-lg mt-6">
            <table class="w-full">
                <tr>
                    <td class="text-gray-600">Subtotal</td>
                    @foreach ($keranjangs as $SubTol)
                        <td class="text-right text-gray-600">{{number_format($SubTol->subtotal)}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="text-gray-900 font-bold">Total</td>
                    <td class="text-right text-gray-900 font-bold">Rp.{{ number_format($total) }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
