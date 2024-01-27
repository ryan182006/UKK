@extends('layout.admin')
@section('content')
@if (session('berhasil'))
        <div class="alert alert-success mb-3 col-lg-12 text-center" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    <div class="card shadow-md mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pesanan Selesai</h6>
        </div>

        <div class="card-body">
            <form action="/cetak-pdf" method="get" class="my-4">
                <h3 class="text-lg font-semibold">Cetak Laporan Penjualan</h3>
                <div class="flex items-center mt-2">
                    <input class="selector border border-gray-300 py-2 px-3 rounded-md w-64 mr-2" name="date" placeholder="Select date" required>
                    <button type="submit" class="btn btn-danger flex items-center">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                        </svg>
                        Generate PDF
                    </button>
                </div>
            </form>            
            <div class="table-responsive">
                <table class="table table-striped dt-responsive nowrap stripe border-2" id="dataTable" width="100%"
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
                                <td class="py-2 px-4 border-b text-center">{{ $checkout->alamat->nama_penerima }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $checkout->alamat->alamat }}, Surabaya</td>
                                <td class="py-2 px-4 border-b text-center">Rp. {{ number_format($checkout->total) }}</td>
                                @if ($checkout->status == '4')
                                    <td class="py-2 px-4 border-b text-center">
                                        <h5><span class="badge bg-gray-300 p-1 rounded-lg text-light">Selesai</span></h5>
                                    </td>
                                @endif
                                <td class="py-2 px-4 border-b text-center">
                                    <a href="/pesanan/admin/{{$checkout ->id}}" class="bg-yellow-300 p-3  px-2 py-1 rounded-lg">Detail</a>
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