@extends('layout.admin')
@section('content')
    <div class="flex justify-between">
        <a href="/barang" class="text-2xl">Product</a>
        <form action="{{ route('cari') }}" method="GET" class="mb-8">
            <div class="flex items-center">
                <input type="text" class="border p-2 rounded-l mr-0 focus:outline-none focus:border-blue-500"
                    placeholder="Search" name="search" value="{{ $search }}">
                <button class="bg-blue-500 text-white p-2 rounded-r focus:outline-none" type="submit">Search</button>
            </div>
        </form>
        @if (session('error'))
            <div class="alert alert-danger mt-4">
                {{ session('error') }}
            </div>
        @endif
        <a href="/barang/create">
            <button
                class="bg-blue-800 rounded-lg text-white px-4 py-2 text-sm hover:scale-105 active:scale-95 transition-all duration-300">Create</button>
        </a>
    </div>
    <div class="bg-gray-400 h-[2px] my-2">
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    
                </th> --}}
                        <td class="px-6 py-4">
                            {{ $barang->nama_barang }}
                        </td>
                        <td class="px-6 py-4">
                            <img class="h-[60px]" src="{{ asset('storage/' . $barang->gambar) }}" alt="tes">

                        </td>
                        <td class="px-6 py-4">
                            {{ $barang->stock }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $barang->deskripsi }}
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{ number_format($barang->harga) }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex float-left ml-3">
                                <a href="/barang/{{ $barang->id }}/edit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <span>Edit</span>
                                </a>
                            </div>
                            <div class="flex float-left ml-5">
                                <form action="barang/{{ $barang->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="" title="Hapus"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                        <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                        </svg>
                                        <span>delete</span></button>
                                </form>
                            </div>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
