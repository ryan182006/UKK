@extends('layout.Main')
@section('content')
<div class="container mx-auto px-6 py-16">
<div class="product-section my-5 mt-16 mb-16">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-6 col-span-full text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mb-6 col-span-full text-center" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="card bg-white shadow-md rounded-lg p-8 ">
                <a href="/pesanan" class="bg-gray-500 text-white rounded-lg p-1 "><button>Back</button></a>
            <div class="card-body my-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="mb-8">
                        <div class="card bg-gray-100 border-none rounded-lg p-6">
                            <div class="card-body">
                                <h4 class="text-xl font-semibold mb-4">Alamat Pengiriman</h4>
                                <p class="mb-2"><span class="font-semibold">Nama Penerima:</span> {{ $checkout->alamat->nama_penerima }}</p>
                                <p class="mb-2"><span class="font-semibold">No. Handphone:</span> {{ $checkout->alamat->no_hp }}</p>
                                <p class="mb-2"><span class="font-semibold">Alamat:</span> {{ $checkout->alamat->alamat }}, {{ $checkout->alamat->kode_pos }}, Surabaya</p>
                                <p class="mb-2"><span class="font-semibold">Catatan:</span> {{ $checkout->catatan }}</p>
                                <p class="mb-2"><span class="font-semibold">Tanggal Pesan:</span> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $checkout->created_at)->format('Y-m-d') }}</p>

                                @if ($checkout->payment_status == '1' && $checkout->status == '5')
                                    <p class="mt-4 text-red-600 font-semibold">Status: Dibatalkan</p>
                                @elseif($checkout->payment_status == '1' && $checkout->status != '5')
                                    <p class="mt-4 text-yellow-600 font-semibold">Status: Belum Dibayar</p>
                                @endif
                                @if ($checkout->status == '1')
                                    <p class="mt-4 text-gray-800 font-semibold">Status: Menunggu Konfirmasi</p>
                                @endif
                                @if ($checkout->status == '2')
                                    <p class="mt-4 text-gray-800 font-semibold">Status: Sedang Diproses</p>
                                @endif
                                @if ($checkout->status == '3')
                                    <p class="mt-4 text-blue-600 font-semibold">Status: Dikirim</p>
                                @endif
                                @if ($checkout->status == '4')
                                    <p class="mt-4 text-green-600 font-semibold">Status: Selesai</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card bg-gray-100 border-none rounded-lg p-6">
                            <div class="card-body">
                                <div class="card-details">
                                    <table class="table borderless text-center w-full">
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
                                                    <td class="product-quantity">{{ $pesanan->kuantitas }}</td>
                                                    <td class="product-total">Rp. {{ number_format($pesanan->sub_total) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="border-t-2 border-gray-300">
                                            <tr>
                                                <td colspan="3" class="text-center font-semibold">Ongkos Kirim</td>
                                                <td class="font-semibold">Rp. {{ number_format($checkout->ongkir) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-center font-semibold">Total</td>
                                                <td class="font-semibold">Rp. {{ number_format($checkout->total) }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                @if ($checkout->payment_status == '1')
                                    <button class="btn btn-lg btn-warning text-light mt-6" id="bayar">Bayar</button>
                                @endif
                            </div>
                        </div>
                        @if ($checkout->status == '4')
                            {{-- <div class="mt-6">
                                <h4 class="text-2xl font-bold mb-4">Beri Rating</h4>
                                <table class="table items-center borderless w-full">
                                    <tbody>
                                        @foreach ($checkout->pesanans as $pesanan)
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="font-semibold">{{ $pesanan->barang->nama }}</td>
                                                <td>
                                                    <div class="container-xl">
                                                        <div class="row">
                                                            <div class="col-xl-12 p-0">
                                                                <form method="POST" action="/rating" class="text-center">
                                                                    @csrf
                                                                    @if (isset($pesanan->rating->pesanan_id))
                                                                        <div class="flex items-center">
                                                                            <span class="myratings me-3 text-yellow-500">{{ $pesanan->rating->rating }}</span>
                                                                            <fieldset class="rating">
                                                                                <input disabled type="radio" id="star5-{{ $pesanan->id }}" name="rating" value="5" {{ $pesanan->rating->rating == 5 ? 'checked' : null }} />
                                                                                <label class="full" for="star5-{{ $pesanan->id }}" title="Awesome - 5 stars"></label>
                                                                                <input disabled type="radio" id="star4half-{{ $pesanan->id }}" name="rating" value="4.5" {{ $pesanan->rating->rating == 4.5 ? 'checked' : null }} />
                                                                                <label class="half" for="star4half-{{ $pesanan->id }}" title="Pretty good - 4.5 stars"></label>
                                                                                <!-- Add similar lines for other stars -->
                                                                                <!-- ... -->
                                                                            </fieldset>
                                                                        </div>
                                                                    @else
                                                                        <div class="flex items-center">
                                                                            <input type="hidden" name="produk_id" value="{{ $pesanan->barang->id }}">
                                                                            <input type="hidden" name="pesanan_id" value="{{ $pesanan->id }}">
                                                                            <span class="myratings me-3 text-yellow-500">0</span>
                                                                            <fieldset class="rating">
                                                                                <input type="radio" id="star5-{{ $pesanan->id }}" name="rating" value="5" />
                                                                                <label class="full" for="star5-{{ $pesanan->id }}" title="Awesome - 5 stars"></label>
                                                                                <!-- Add similar lines for other stars -->
                                                                                <!-- ... -->
                                                                                <input type="radio" class="reset-option" name="rating" value="reset" />
                                                                            </fieldset>
                                                                            <div class="ms-3">
                                                                                <button class="btn btn-sm border-2 border-yellow-500 text-yellow-500" type="submit">Simpan</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("input[type='radio']").click(function() {
                var sim = $(this).val();
                //alert(sim);
                if (sim < 3) {
                    $(this).parent().prev().css('color', 'red');
                    $(this).parent().prev().text(sim);
                } else {
                    $(this).parent().prev().css('color', 'green');
                    $(this).parent().prev().text(sim);
                }
            });
        });
    </script>

    @if ($checkout->payment_status == '1')
        <script>
            $('#bayar').on('click', function(e) {
                e.preventDefault();
                snap.pay('{{ $checkout->snap_token }}', {
                    onSuccess: function(result) {
                        console.log(result);
                        window.location.href = '/pesanan'
                    }
                });
            })
        </script>
    @endif
@endsection