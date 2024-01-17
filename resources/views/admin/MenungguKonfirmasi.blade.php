@extends('layout.admin')

@section('content')
<div class="card shadow mb-4">
    @if (session('success'))
    <div class="alert alert-success mb-3 col-lg-12 text-center" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-header py-3">
        <h6 class="m-0 font-semibold text-primary">Pesanan Menunggu Konfirmasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Nama Penerima</th>
                        <th class="py-2 px-4 border-b">Alamat</th>
                        <th class="py-2 px-4 border-b">Total Harga</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkouts as $checkout)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $checkout->alamat->nama_penerima }}</td>
                        <td class="py-2 px-4 border-b">{{ $checkout->alamat->alamat }}, Surabaya</td>
                        <td class="py-2 px-4 border-b">Rp. {{ number_format($checkout->total) }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($checkout->status == '1')
                            <span class="bg-dark text-black px-2 py-1 rounded-full">Menunggu Konfirmasi</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="/pesanan/admin/{{ $checkout->id }}" class="btn btn-primary btn-sm">Detail</a>
                            <form action="/changeStatus/{{ $checkout->id }}" method="post" class="inline-block">
                                @csrf
                                <input type="hidden" name="action" value="konfirmasi">
                                <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
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
