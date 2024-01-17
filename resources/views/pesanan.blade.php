@extends('layout.main')
@section('content')
<section class="shopping-cart spad">
    <div class="container">
        <div class="table-responsive">
            <table class="min-w-full bg-white border border-gray-300">
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
                                <th scope="row" class="py-2">{{ $loop->iteration }}</th>
                                <td class="py-2">{{ $checkout->alamat->nama_penerima }}</td>
                                <td class="py-2">{{ $checkout->alamat->alamat }}, Surabaya</td>
                                <td class="py-2">Rp. {{ number_format($checkout->total) }}</td>
                                <td class="py-2">
                                    @if ($checkout->payment_status == '1' && $checkout->status == '5')
                                        <h5><span class="badge bg-red-500">Dibatalkan</span></h5>
                                    @elseif ($checkout->payment_status == '1')
                                        <h5><span class="badge bg-yellow-500">Belum Dibayar</span></h5>
                                    @elseif($checkout->payment_status == '2')
                                        @if ($checkout->status == '1')
                                            <h5><span class="badge bg-gray-800">Menunggu Konfirmasi</span></h5>
                                        @elseif($checkout->status == '2')
                                            <h5><span class="badge bg-gray-700">Diproses</span></h5>
                                        @elseif($checkout->status == '3')
                                            <h5><span class="badge bg-blue-500 text-white">Dikirim</span></h5>
                                        @elseif($checkout->status == '4')
                                            <h5><span class="badge bg-green-500">Selesai</span></h5>
                                        @endif
                                    @else
                                        <h5><span class="badge bg-red-500">Kadaluarsa</span></h5>
                                    @endif
                                </td>
                                <td class="py-2 flex justify-center">
                                    @if ($checkout->payment_status != '3' && $checkout->status != '5')
                                        <a href="/pesanan/{{ $checkout->id }}" class="btn btn-primary">Detail</a>
                                    @endif
                                    @if ($checkout->status == '5' || $checkout->payment_status == '3' || $checkout->status == '4')
                                        <form action="/changeStatus/{{ $checkout->id }}" method="post" class="ms-2">
                                            @csrf
                                            <input type="hidden" name="action" value="hapus">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    @endif
                                    @if ($checkout->payment_status == '1' && $checkout->status != '5')
                                        <form action="/changeStatus/{{ $checkout->id }}" method="post" class="ms-2">
                                            @csrf
                                            <input type="hidden" name="action" value="batal">
                                            <button type="submit" class="btn btn-danger">Batalkan</button>
                                        </form>
                                    @endif
                                    @if ($checkout->status == '3')
                                        <form action="/changeStatus/{{ $checkout->id }}" method="post" class="ms-2">
                                            @csrf
                                            <input type="hidden" name="action" value="terima">
                                            <button type="submit" class="btn btn-success">Diterima</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="py-2">Anda Belum Memesan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection