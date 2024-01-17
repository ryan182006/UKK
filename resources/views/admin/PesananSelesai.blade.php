@extends('layout.admin')
@section('content')
@if (session('berhasil'))
        <div class="alert alert-success mb-3 col-lg-12 text-center" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pesanan Selesai</h6>
        </div>

        <div class="card-body">
            <form action="/cetak-pdf" method="get" class="my-4">
                <h3>Cetak Laporan Penjualan</h3>
                <input class="selector" name="timestamp" class="form-control" required>
                <button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>
            </form>
            <div class="table-responsive">
                <table class="table table-striped dt-responsive nowrap stripe" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Penerima</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($checkouts as $checkout)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $checkout->alamat->nama_penerima }}</td>
                                <td>{{ $checkout->alamat->alamat }}, Surabaya</td>
                                <td>Rp. {{ number_format($checkout->total) }}</td>
                                @if ($checkout->status == '4')
                                    <td>
                                        <h5><span class="badge bg-success text-light">Selesai</span></h5>
                                    </td>
                                @endif
                                <td>
                                    <a href="/pesanan/admin/{{ $checkout->id }}" class="btn btn-primary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".selector").flatpickr({
                enableTime: false,
                mode: "range",
                dateFormat: "Y-m-d",
            });
        });
    </script>
@endsection