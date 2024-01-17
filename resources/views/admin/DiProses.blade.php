@extends('layout.admin')

@section('content')
<div class="card shadow mb-4">
    @if (session('success'))
    <div class="alert alert-success mb-3 col-lg-12 text-center" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-header py-3">
        <h6 class="m-0 font-semibold text-primary">Pesanan Menunggu Di Proses</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center">No</th>
                        <th class="py-2 px-4 border-b text-center">Nama Penerima</th>
                        <th class="py-2 px-4 border-b text-center">Alamat</th>
                        <th class="py-2 px-4 border-b text-center">Total Harga</th>
                        <th class="py-2 px-4 border-b text-center">Status</th>
                        <th class="py-2 px-4 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkouts as $checkout)
                    <tr>
                        <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $checkout->alamat->nama_penerima }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $checkout->alamat->alamat }}, Surabaya</td>
                        <td class="py-2 px-4 border-b text-center">Rp. {{ number_format($checkout->total) }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            @if ($checkout->status == '2')
                            <h5><span class="badge bg-secondary text-light">Diproses</span></h5>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b text-center space-x-2">
                            <a href="/pesanan/admin/{{ $checkout->id }}" class="btn btn-primary btn-sm">Detail</a>
                            <form action="/changeStatus/{{ $checkout->id }}" method="post" class="inline-block">
                                @csrf
                                <input type="hidden" name="action" value="kirim">
                                <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
