@extends('layout.main')
@section('content')

<div class="container mx-auto px-6 py-16">
<p class="text-center mt-4 my-3">Riwayat belanja.</p>
<section class="shopping-cart spad">
    <div class="container">
        <div class="table-responsive">
            <table class="min-w-full bg-white border-2 border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="py-2 text-center">#</th>
                        <th scope="col" class="py-2 text-center">Nama Penerima</th>
                        <th scope="col" class="py-2 text-center">Alamat</th>
                        <th scope="col" class="py-2 text-center">Total Harga</th>
                        <th scope="col" class="py-2 text-center">Status</th>
                        <th scope="col" class="py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($checkouts->count() > 0)
                        @foreach ($checkouts as $checkout)
                            <tr>
                                <td scope="row" class="py-2 text-center">{{ $loop->iteration }}</td>
                                <td class="py-2 text-center">{{ $checkout->alamat->nama_penerima }}</td>
                                <td class="py-2 text-center">{{ $checkout->alamat->alamat }}, Surabaya</td>
                                <td class="py-2 text-center">Rp. {{ number_format($checkout->total) }}</td>
                                <td class="py-2 text-center text-black  ">
                                    @if ($checkout->payment_status == '1' && $checkout->status == '5')
                                        <span class="badge bg-red-500 p-1 text-center my-2 rounded-lg">Dibatalkan</span>
                                    @elseif ($checkout->payment_status == '1')
                                        <span class="badge bg-yellow-500">Belum Dibayar</span>
                                    @elseif($checkout->payment_status == '2')
                                        @if ($checkout->status == '1')
                                            <span class="badge bg-gray-200 p-1 text-center my-2 rounded-lg">Menunggu Konfirmasi</span>
                                        @elseif($checkout->status == '2')
                                            <span class="badge bg-gray-200 rounded-lg p-1">Diproses</span>
                                        @elseif($checkout->status == '3')
                                            <span class="badge bg-gray-200 rounded-lg p-1">Dikirim</span>
                                        @elseif($checkout->status == '4')
                                            <span class="badge bg-green-500 rounded-lg p-1">Selesai</span>
                                        @endif
                                    @else
                                        <span class="badge bg-red-500 rounded-lg p-1">Kadaluarsa</span>
                                    @endif
                                </td>
                                <td class="py-2 text-center">
                                    @if ($checkout->payment_status != '3' && $checkout->status != '5')
                                        <a href="/pesanan/{{ $checkout->id }}" class="p-1 bg-yellow-300 rounded-lg  mx-2">Detail</a>
                                    @endif
                                    @if ($checkout->status == '5' || $checkout->payment_status == '3' || $checkout->status == '4')
                                        <form action="/changeStatus/{{ $checkout->id }}" method="post" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="action" value="hapus">
                                            <button type="submit" class="bg-red-500 rounded-lg p-1 text-light-50 mx-2">Hapus</button>
                                        </form>
                                    @endif
                                    @if ($checkout->payment_status == '1' && $checkout->status != '5')
                                        <form action="/changeStatus/{{ $checkout->id }}" method="post" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="action" value="batal">
                                            <button type="submit" class="btn btn-danger mx-2">Batalkan</button>
                                        </form>
                                    @endif
                                    @if ($checkout->status == '3')
                                        <form action="/changeStatus/{{ $checkout->id }}" method="post" class="inline-block">
                                            @csrf
                                            <input type="hidden" name="action" value="terima">
                                            <button type="submit" class="bg-green-400 rounded-lg p-1 mx-2">Diterima</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="py-2 text-center">Anda Belum Memesan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
@endsection