@extends('layout.Main')
@section('content')
    <!-- end breadcrumb section -->
    <div class="container mx-auto px-6 py-16">
    <div class="checkout-section mt-16 mb-16 flex justify-between bg-white p-6 rounded-xl shadow-lg">
        <div class="w-[48%]">
            <p class="font-bold text-lg">PERHATIAN!!!</p>
            <p class="text-gray-500">Kami tidak memproses pesanan diluar Surabaya, Harap memeriksa kembali
                alamat yang anda masukkan!</p>
            @include('partials.modals.daftarAlamat')
            <!-- Address Section -->
            <div class="mb-4">
                <button id="accordionButton" class="w-[97%] my-2 bg-blue-500 text-white py-2 px-4 mb-2">
                    <label for="alamat" class="block text-white  mb-2">Alamat Pengiriman:</label>
                    
                </button>

                <!-- Accordion Content -->
                <div id="accordionContent" class="hidden p-4">
                    <form class="w-full" action="/pembayaran" method="post">
                        @csrf
                        <div class="mb-4">
                            @if ($daftar_alamats->count() > 0)
                                <label for="daftar_alamat_id" class="block  mb-2">Alamat:</label>
                                <select id="daftar_alamat_id" name="daftar_alamat_id" class="w-full p-2 border rounded">
                                    <option value="">-- Pilih Alamat Tujuan --</option>
                                    @foreach ($daftar_alamats as $daftar_alamat)
                                        <option value="{{ $daftar_alamat->id }}">
                                            {{ $daftar_alamat->nama_penerima }} |
                                            {{ $daftar_alamat->alamat }},
                                            {{ $daftar_alamat->kode_pos }},
                                            {{ $daftar_alamat->kecamatan->nama_kecamatan }},
                                            Surabaya |
                                            {{ $daftar_alamat->no_hp }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <!-- Add other address form fields as needed -->
                        {{-- <button type="submit" class="bg-green-500 text-white py-2 px-4">
                            Simpan Alamat
                        </button> --}}

                </div>


                <!-- Order Details Section -->
                <div class="mb-4">
                    <div class= "pr-4">
                        <button id="orderDetailsButton" type="button" class="w-full bg-blue-500 text-white py-2 px-4 mb-2">
                            catatan
                        </button>
                    </div>

                    <!-- Accordion Content -->
                    <div id="orderDetailsContent" class="hidden">
                        <div class="mb-4">
                            <label for="catatan" class="block text-gray-700 font-bold mb-2">Cattan:</label>
                            <textarea id="catatan" name="catatan" rows="4" class="w-full p-2 border rounded"></textarea>
                        </div>
                        <input type="hidden" name="courier" value="tiki" />
                        <input type="hidden" name="ongkir" value="7000" />
                        <input type="hidden" name="estimasi" value="1" />
                    </div>


                    <!-- Order Button -->

                </div>
            </div>
        </div>

        <!-- Move the table to the right column -->
        <div class="w-[48%]">
            <table class="w-full border-2 border-black">
                <thead>
                    <tr>
                        <th class="border-2 border-black">Pesanan mu</th>
                        <th class="border-2 border-black">Harga</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr>
                        <td class="border-2 border-black">Produk</td>
                        <td class="border-2 border-black">Total</td>
                    </tr>
                    @foreach ($keranjangs as $keranjang)
                        <tr>
                            <td class="border border-black">{{ $keranjang->barang->nama_barang }} </td>
                            <td class="border border-black">Rp.{{ number_format($keranjang->barang->harga) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tbody class="checkout-details">
                    <tr>
                        <td class="border-2 border-black">Subtotal</td>
                        <td class="border-2 border-black">Rp. {{ number_format($keranjang->subtotal) }}</td>
                    </tr>
                    <tr>
                        <td class="border-2 border-black">Shipping</td>
                        <td class="border-2 border-black"><span id="ongkir">Rp. 7,000</span></td>
                    </tr>
                    <tr>
                        <td class="border-2 border-black">Total</td>
                        <td class="border-2 border-black"><span id="total">Rp. {{ number_format($total + 7000) }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
            @if ($daftar_alamats->count() > 0)
                <button type="submit" class="bg-green-500 text-white p-2 my-2 rounded-lg">PESAN SEKARANG</button>
            @endif
        </div>
        </form>
    </div>
    </div>
    @endsection

    <!-- Include Tailwind JS and Vanilla JS -->

@section('script')


<script>
    $('#daftar_alamat_id').on('change', function(e) {
        console.log('tes');
        const inp = $('#layanan')
        const ongkir = $('#ongkir')
        let total = document.querySelector('#total').innerText.replaceAll("Rp. ", "").replaceAll(",", "");
        inp.prop("disabled", true);
        $.ajax({
            url: "/checkout/cek_ongkir",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                daftar_alamat_id: $('[name="daftar_alamat_id"]').val(),
                courier: $('[name="courier"]').val(),
            },
            dataType: 'json',
            success: function({
                results
            }) {
                const data = results[0];
                inp.empty()
                inp.append(new Option('-- Pilih Layanan --', ''))
                data.costs.forEach(cost => {
                    inp.append(new Option(cost.service + ' | ' + cost
                        .description + ' | ' + cost.cost[0].value, cost.service));
                    // console.log(cost);
                    // console.log(cost);
                })
                inp.on('change', function(e) {
                    // ongkir.html(cost);
                    const selected = data.costs.find(cost => cost.service === e.target
                        .value);
                    ongkir.html('Rp. ' + selected.cost[0].value);
                    document.querySelector('[name="ongkir"]').value = selected.cost[0]
                        .value;
                    document.querySelector('[name="estimasi"]').value = selected.cost[0]
                        .etd;
                    document.querySelector('#total').innerText =
                        'Rp. ' + (parseInt(total) + parseInt(selected.cost[0].value))
                        .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                })
                inp.prop("disabled", false);
            },
            error: function(response) {
                   console.log(response);
        },
        })
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var accordionButton = document.getElementById('accordionButton');
        var accordionContent = document.getElementById('accordionContent');
        var orderDetailsButton = document.getElementById('orderDetailsButton');
        var orderDetailsContent = document.getElementById('orderDetailsContent');

        accordionButton.addEventListener('click', function() {
            toggleAccordion(accordionContent);
        });

        orderDetailsButton.addEventListener('click', function() {
            toggleAccordion(orderDetailsContent);
        });

        function toggleAccordion(element) {
            element.classList.toggle('hidden');
        }
    });
</script>
    
@endsection
    

