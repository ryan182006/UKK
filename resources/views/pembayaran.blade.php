@extends('layout.Main')
@section('content')
<div class="container my-5 bg-white rounded-xl shadow-lg">
    <div class="card p-4 rounded-lg">
        <div class="card-body">
            <div class="flex flex-wrap">
                <div class="lg:w-1/2 mb-4 lg:mb-0">
                    <div class="card bg-white border-2 rounded-lg shadow-md">
                        <div class="card-body mx-2 font-semibold ">
                            <h4 class="my-3 text-black font-bold">Alamat Pengiriman</h4>
                            <p class="mb-2"><span class="font-bold">Nama Penerima:</span> {{ $daftar_alamats->nama_penerima }}</p>
                            <p class="mb-2"><span class="font-bold">No. Handphone:</span> {{ $daftar_alamats->no_hp }}</p>
                            <p class="mb-2"><span class="font-bold">Alamat:</span> {{ $daftar_alamats->alamat }}, {{ $daftar_alamats->kecamatan->nama_kecamatan }}, {{ $daftar_alamats->kode_pos }}, Surabaya.</p>
                            <p class="mb-2"><span class="font-bold">Catatan:</span> {{ $catatan }}</p>
                            <p class="mb-2"><span class="font-bold">Tanggal Dipesan:</span> {{ Carbon\Carbon::now()->format('Y-m-d') }}</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <div class="card bg-red-100 border-none rounded-lg shadow-md m-4">
                        <div class="card-body">
                            <div class="card-details">
                                <table class="table text-center w-full border">
                                    <thead>
                                        <tr class="table-head-row">
                                            <th class="border-t-0 border-b border-gray-300 product-name">Nama Barang</th>
                                            <th class="border-t-0 border-b border-gray-300 product-price">Harga</th>
                                            <th class="border-t-0 border-b border-gray-300 product-quantity">Kuantitas</th>
                                            <th class="border-t-0 border-b border-gray-300 product-total">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjangs as $keranjang)
                                            <tr class="table-body-row">
                                                <td class="border-t-0 border-b border-gray-300 product-name">{{ $keranjang->barang->nama_barang }}</td>
                                                <td class="border-t-0 border-b border-gray-300 product-price">Rp. {{ number_format($keranjang->barang->harga) }}</td>
                                                <td class="border-t-0 border-b border-gray-300 product-quantity">{{ $keranjang->kuantitas }}</td>
                                                <td class="border-t-0 border-b border-gray-300 product-total">Rp. {{ number_format($keranjang->subtotal) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="border-t-1 border-b-0 border-gray-300">
                                        <tr>
                                            <td colspan="3" class="text-center">Ongkos Kirim</td>
                                            <td>Rp. 7,000</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center border-b-0">Total</td>
                                            <td class="border-b-0">Rp. {{ number_format($total + 7000) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button class="bg-gray-700 text-white rounded-lg p-2 mx-10 my-4 mt-4" id="bayar">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="pesan text-lg text-green-600 font-semibold"></h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
@if ($keranjangs->count() == null)
    <script>
        window.location = "/pesanan";
    </script>
@else
    <script>
        console.log('tes');
        $('#bayar').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('checkout.charger') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    daftar_alamat_id: "{{ request()->daftar_alamat_id }}",
                    courier: "{{ request()->courier }}",
                    layanan: "{{ request()->layanan }}",
                    catatan: "{{ request()->catatan }}",
                    ongkir: "{{ request()->ongkir }}",
                    estimasi: "{{ request()->estimasi }}"
                },
                success: function(response) {
                    snap.pay(response.snap_token, {
                        onSuccess: function(result) {
                            console.log(result);
                            window.location.href = '/pesanan'
                        }
                    });
                }
            })
        })
    </script>
@endif
@endsection