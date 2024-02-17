@extends('layout.admin')
@section('content')
    <div class="grid grid-cols-3 ">
        <div class="rounded-lg col-span-1 shadow-black shadow-lg p-6 mb-4 w-64 ">
            <a href="/barang">
                <svg class="w-10 h-10 text-amber-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 6.2 7 9.4l5 3.2-5 3.2-5-3.3 5-3.1-5-3.2L7 3l5 3.2ZM7 17.8l5-3.2 5 3.2-5 3.2-5-3.2Z" />
                    <path d="m12 12.5 5-3.1-5-3.2L17 3l5 3.2-5 3.2 5 3.2-5 3.2-5-3.3Z" />
                </svg>
                <h5 class="text-lg font-bold mb-2">Jumlah Barang Seluruh</h5>
                <p>{{ count($barangs) }}</p>
            </a>
        </div>

        <div class="rounded-lg col-span-1 shadow-black shadow-lg p-6 mb-4 w-64">
            <a href="pesanan-admin/dibatalkan">
                <svg class="w-10 h-10 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                        clip-rule="evenodd" />
                </svg>
                <h5 class="text-lg font-bold mb-2">Belum DiBayar</h5>
                <p>{{ count($belumDibayar) }}</p>
            </a>
        </div>

        <div class="rounded-lg col-span-1 shadow-black shadow-lg p-6 mb-4 w-64">
            <a href="pesanan-admin/menunggu-konfirmasi">
                <svg class="w-10 h-10 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M18 14a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2v-2Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M15 21.5a10 10 0 1 1 3.6-17L10.9 12 7.7 8.9a1 1 0 0 0-1.4 1.4l4 4a1 1 0 0 0 1.3 0L20 5.8a10 10 0 0 1 1.6 9.1c-.4-.3-1-.5-1.5-.5h-.5V14a2.5 2.5 0 0 0-5 0v.5H14a2.5 2.5 0 0 0 0 5h.5v.5c0 .6.2 1.1.5 1.5Z"
                        clip-rule="evenodd" />
                </svg>


                <h5 class="text-lg font-bold mb-2">Menunggu Konfirmasi</h5>
                <p>{{ count($menungguKonfirmasi) }}</p>
            </a>
        </div>
        <div class="rounded-lg col-span-1 shadow-black shadow-lg p-6 mb-4 w-64">
            <a href="pesanan-admin/diproses">
                <svg class="w-10 h-10 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v4c0 .3.1.5.3.7l3 3a1 1 0 0 0 1.4-1.4L13 11.6V8Z"
                        clip-rule="evenodd" />
                </svg>

                <h5 class="text-lg font-bold mb-2">DiProses</h5>
                <p>{{ count($diproses) }}</p>
            </a>
        </div>
        <div class="rounded-lg col-span-1 shadow-black shadow-lg p-6 mb-4 w-64">
            <a href="pesanan-admin/dikirim">
                <svg class="w-10 h-10 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 0 0-2 2v9c0 .6.4 1 1 1h.5v.5a3.5 3.5 0 1 0 7-.5h3v.5a3.5 3.5 0 1 0 7-.5h.5c.6 0 1-.4 1-1v-4l-.1-.4-2-4A1 1 0 0 0 19 6h-5a2 2 0 0 0-2-2H4Zm14.2 11.6.3.9a1.5 1.5 0 1 1-.3-1Zm-10 0 .3.9a1.5 1.5 0 1 1-.3-1ZM14 10V8h4.4l1 2H14Z"
                        clip-rule="evenodd" />
                </svg>

                <h5 class="text-lg font-bold mb-2">Di Kirim</h5>
                <p>{{ count($dikirim) }}</p>
            </a>
        </div>

        <div class="rounded-lg col-span-1 shadow-black shadow-lg p-6 mb-4 w-64">
            <a href="pesanan-admin/selesai">
                <svg class="w-10 h-10 text-green-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm13.7-1.3a1 1 0 0 0-1.4-1.4L11 12.6l-1.8-1.8a1 1 0 0 0-1.4 1.4l2.5 2.5c.4.4 1 .4 1.4 0l4-4Z"
                        clip-rule="evenodd" />
                </svg>

                <h5 class="text-lg font-bold mb-2">Penjualan Selesai</h5>
                <p>{{ count($penjualanSelesai) }}</p>
            </a>
        </div>
        <div class="rounded-lg col-span-1 shadow-black shadow-lg p-6 mb-4 w-64">
                <svg class="w-10 h-10 text-yellow-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17.3a5 5 0 0 0 2.6 1.7c2.2.6 4.5-.5 5-2.3.4-2-1.3-4-3.6-4.5-2.3-.6-4-2.7-3.5-4.5.5-1.9 2.7-3 5-2.3 1 .2 1.8.8 2.5 1.6m-3.9 12v2m0-18v2.2"/>
                  </svg>
                <h5 class="text-lg font-bold mb-2">Hasil Penjualan</h5>
                <p>{{ number_format( $hasilPenjualan) }}</p>
        </div>
        
    </div>
@endsection
    