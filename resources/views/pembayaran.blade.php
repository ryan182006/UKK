@extends('layout.Main')
@section('content')
<div class="container my-5">
    <div class="card p-4 rounded-lg">
        <div class="card-body">
            <div class="flex flex-wrap">
                <div class="lg:w-1/2 mb-4 lg:mb-0">
                    <div class="card bg-white border-2 rounded-lg">
                        <div class="card-body">
                            <h4 class="my-3 font-semibold text-dark">Alamat Pengiriman</h4>
                            <h5>Nama Penerima: <p>{{ $daftar_alamats->nama_penerima }}</p></h5>
                            <h5>No. Handphone: <p>{{ $daftar_alamats->no_hp }}</p></h5>
                            <h5>Alamat: <p>{{ $daftar_alamats->alamat }}, {{ $daftar_alamats->kecamatan->nama_kecamatan }}, {{ $daftar_alamats->kode_pos }}, Surabaya.</p></h5>
                            <h5>Catatan: <p>{{ $catatan }}</p></h5>
                            <h5>Tanggal Dipesan: <p>{{ Carbon\Carbon::now()->format('Y-m-d') }}</p></h5>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <div class="card bg-gray-100 border-none rounded-lg">
                        <div class="card-body">
                            <div class="card-details">
                                <table class="table text-center">
                                    <thead>
                                        <tr class="table-head-row">
                                            <th class="border-t-0 product-name">Nama Barang</th>
                                            <th class="border-t-0 product-price">Harga</th>
                                            <th class="border-t-0 product-quantity">Kuantitas</th>
                                            <th class="border-t-0 product-total">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjangs as $keranjang)
                                            <tr class="table-body-row">
                                                <td class="product-name">{{ $keranjang->barang->nama_barang }}</td>
                                                <td class="product-price">Rp. {{ number_format($keranjang->barang->harga) }}</td>
                                                <td class="product-quantity text-center">{{ $keranjang->kuantitas }}</td>
                                                <td class="product-total">Rp. {{ number_format($keranjang->subtotal) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="border-t-1 border-gray-300">
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
                            <button class="btn btn-lg btn-warning text-light mt-4" id="bayar">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="pesan"></h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
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