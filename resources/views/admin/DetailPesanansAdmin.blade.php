@extends('layout.admin')
@section('content')
@if (session('berhasil'))
<div class="alert alert-success mb-3 col-lg-12 text-center" role="alert">
    {{ session('berhasil') }}
</div>
@endif

<a href="javascript:history.back()" class="btn btn-danger mb-4"><i class="fa fa-chevron-left" aria-hidden="true"></i>
Kembali</a>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan</h6>
    <div class="product-section my-5 mt-150 mb-150">
        <div class="container">
            <div class="card-body">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="lg:col-span-6">
                        <div class="bg-gray-100 border-none rounded-md p-6">
                            <h4 class="my-3 text-dark font-semibold">Alamat Pengiriman</h4>
                            <p class="mb-3"><span class="font-bold">Nama Penerima:</span> {{ $checkout->alamat->nama_penerima }}</p>
                            <p class="mb-3"><span class="font-bold">No. Handphone:</span> {{ $checkout->alamat->no_hp }}</p>
                            <p class="mb-3"><span class="font-bold">Alamat:</span> {{ $checkout->alamat->alamat }},
                                {{ $checkout->alamat->kode_pos }},
                                Surabaya
                            </p>
                            <p class="mb-3"><span class="font-bold">Catatan:</span> {{ $checkout->catatan }}</p>
                            <p class="mb-3"><span class="font-bold">Tanggal Pesan:</span>
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $checkout->created_at)->format('Y-m-d') }}
                            </p>

                            @if ($checkout->payment_status == '1')
                                <button class="btn btn-lg btn-warning text-light mt-4" id="bayar">Bayar</button>
                            @endif
                            @if ($checkout->payment_status == '1' && $checkout->status == '5')
                                <h5 class="mt-4">Status : <span class="badge bg-red-500 text-white">Dibatalkan</span></h5>
                            @elseif($checkout->payment_status == '1' && $checkout->status != '5')
                                <h5 class="mt-4">Status : <span class="badge bg-yellow-500 text-white">Belum Dibayar</span></h5>
                            @endif
                            @if ($checkout->status == '1')
                                <h5 class="mt-4">Status : <span class="badge bg-gray-800 text-white">Menunggu Konfirmasi</span></h5>
                            @endif
                            @if ($checkout->status == '2')
                                <h5 class="mt-4">Status : <span class="badge bg-gray-700 text-white">Sedang Diproses</span></h5>
                            @endif
                            @if ($checkout->status == '3')
                                <h5 class="mt-4">Status : <span class="badge bg-blue-500 text-white">Dikirim</span></h5>
                            @endif
                            @if ($checkout->status == '4')
                                <h5 class="mt-4">Status : <span class="badge bg-green-500 text-white">Selesai</span></h5>
                            @endif
                        </div>
                    </div>
                    <div class="lg:col-span-6">
                        <div class="bg-gray-100 border-none rounded-md p-6">
                            <div class="card-details">
                                <table class="table border-collapse text-center">
                                    <thead>
                                        <tr class="table-head-row">
                                            <th class="product-name">Nama Barang</th>
                                            <th class="product-price">Harga</th>
                                            <th class="product-quantity">Kuantitas</th>
                                            <th class="product-total">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($checkout->pesanans as $pesanan)
                                            <tr class="table-body-row">
                                                <td class="product-name">{{ $pesanan->barang->nama_barang }}</td>
                                                <td class="product-price">Rp. {{ number_format($pesanan->barang->harga) }}</td>
                                                <td class="product-quantity text-center">{{ $pesanan->kuantitas }}</td>
                                                <td class="product-total">Rp. {{ number_format($pesanan->sub_total) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="border-t-2 border-gray-300">
                                        <tr>
                                            <td colspan="3" class="text-center">Ongkos Kirim</td>
                                            <td>Rp. {{ number_format($checkout->ongkir) }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">Total</td>
                                            <td>Rp. {{ number_format($checkout->total) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
