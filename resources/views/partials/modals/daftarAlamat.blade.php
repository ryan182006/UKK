<div id="modal" class="fixed z-10 inset-0 overflow-y-auto " style="display: none;">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="overlay" class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div id="modal-container" class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <div class="modal-header">
                <h5 class="modal-title font-bold" id="modal-headline">Daftar Alamat (Sekitar Surabaya)</h5>
                <button id="close-modal" type="button" class="btn-close" aria-label="Close"></button>
            </div>

            <form action="/daftar-alamat" method="POST" class="billing-address-form">
                @csrf
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="nama_penerima" class="block text-sm font-medium text-gray-600">Nama Penerima</label>
                        <input required type="text" id="nama_penerima" name="nama_penerima"
                            class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat</label>
                        <input required type="text" id="alamat" name="alamat" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="kecamatan_id" class="block text-sm font-medium text-gray-600">Kecamatan</label>
                        <select name="kecamatan_id" class="form-select w-full" required id="kecamatan_id">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex">
                        <div class="mb-4 mr-2 w-1/2">
                            <label for="kode_pos" class="block text-sm font-medium text-gray-600">Kode Pos</label>
                            <input required type="number" min="0" id="kode_pos" name="kode_pos"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <div class="mb-4 w-1/2">
                            <label for="no_hp" class="block text-sm font-medium text-gray-600">No. Handphone</label>
                            <input required type="number" min="0" id="no_hp" name="no_hp"
                                class="mt-1 p-2 w-full border rounded-md">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button  class="bg-green-500 rounded-lg p-2 mt-2 text-white"><a href="/checkout">Back</a></button>
                    <button type="submit" class="bg-green-500  rounded-lg p-2 mt-2 text-white">Simpan</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<button id="open-modal" class="bg-green-500 rounded-lg p-2 text-white">Tambahkan alamat</button>
<script>
    // JavaScript vanilla untuk mengelola tampilan modal
    const modal = document.getElementById('modal');
    const overlay = document.getElementById('overlay');
    const openModalButton = document.getElementById('open-modal');
    const closeModalButton = document.getElementById('close-modal');

    openModalButton.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    closeModalButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target === overlay) {
            modal.style.display = 'none';
        }
    });
</script>
