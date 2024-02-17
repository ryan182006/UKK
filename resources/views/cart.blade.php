@extends('layout.Main')
@section('content')

<div class="container mx-auto px-6 py-16">
    <div class="container mx-auto">
        <div>
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif
            @if (session('error'))
                <div class="mb-3 col-lg-12 text-center text-red-600" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <a href="{{ route('home') }}"><button
                class="text-xl font-bold mb-4 bg-blue-500 p-2 rounded-lg text-white">Back</button></a>
        <h1 class="text-4xl font-bold mb-4">Shopping Cart</h1>
        <table class="w-full border border-gray-300 bg-white">
            <thead>
                <tr>
                    <th class="text-left p-2">Gambar Product</th>
                    <th class="text-left p-2">Nama Product</th>
                    <th class="text-left p-2">Deskripsi Berat</th>
                    <th class="text-left p-2">Price</th>
                    <th class="text-left p-2">Quantity</th>
                    <th class="text-left p-2">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjangs as $keranjang)
                    <tr>
                        <td class="text-left p-2 h-[50px]">
                            <div class="text-sm text-gray-900 ">
                                <img src="{{ asset('storage/' . $keranjang->barang->gambar) }}" alt=""
                                    class="h-[60px]">
                            </div>
                        </td>
                        <td class="text-left p-2">
                            <div class="text-sm text-gray-900">{{ $keranjang->barang->nama_barang }}</div>
                        </td>
                        <td class="text-left p-2">
                            <div class="text-sm text-gray-900">{{ $keranjang->barang->berat * $keranjang->kuantitas }} Gram</div>
                        </td>
                        <td class="text-left p-2">
                            <div class="text-sm text-gray-900">{{number_format($keranjang->barang->harga) }}</div>
                        </td>
                        <td class="text-left p-2 ">
                            <div class="text-sm text-gray-900">
                                <form action="/cart/cart/{{ $keranjang->barang->id }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="number" min="0" max="{{ $keranjang->barang->stock }}"
                                        name="kuantitas" class="kuantitas" id="kuantitas"
                                        data-id="{{ $keranjang->id }}" value="{{ $keranjang->kuantitas }}">
                                </form>
                            </div>
                        </td>
                        <td class="text-left p-2">
                            <form action="/cart/cart/{{ $keranjang->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-600 hover:text-red-900">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Subtotal Table -->
        <div class="bg-white p-4 rounded-lg mt-6 border border-gray-300">
            <table class="w-full">
                <tr>
                    <td class="text-gray-600">Subtotal</td>
                    @foreach ($keranjangs as $SubTol)
                        <td class="text-right text-gray-600">{{ number_format($SubTol->subtotal) }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td class="text-gray-900 font-bold">Total</td>
                    <td class="text-right text-gray-900 font-bold">Rp.{{ number_format($total) }}</td>
                </tr>
            </table>
            <div class="flex items-center justify-center">
                <a href="/checkout" class="bg-blue-600 rounded-lg text-white p-2">Check Out</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function debounce(func, timeout = 1000) {
            let timer;
            return (...args) => {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    func.apply(this, args);
                }, timeout);
            };
        }
        document.querySelectorAll('.kuantitas').forEach(item => {
            item.addEventListener('input', debounce(function() {
                const id = item.dataset.id;
                const kuantitas = item.value;
                const url = `/cart/cart/${id}`;
                console.log(id);
                $.ajax({
                    url: url,
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                    },
                    data: {
                        kuantitas: kuantitas,
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(response) {
                        console.log(response);
                    },

                });
            }, 1000));
        });
    </script>
@endsection
