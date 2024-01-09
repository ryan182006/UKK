<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="text-white text-2xl font-bold logo">
                    <a href="/">Toko Online</a>
                </div>

                <div class="hidden md:block">
                    <ul class="list-none flex flex-row mt-4 md:mt-0">
                        <li class="mr-6">
                            <a href="{{ route('login') }}"
                                class="text-gray-200 text-lg font-semibold hover:text-gray-300">Toko</a>
                        </li>
                        <li class="mr-6">
                            <a href="{{ route('login') }}"
                                class="text-gray-200 text-lg font-semibold hover:text-gray-300">Tentang
                                Kami</a>
                        </li>
                        <li class="mr-6">
                            <a href="{{ route('login') }}"
                                class="text-gray-200 text-lg font-semibold hover:text-gray-300">Kontak</a>
                        </li>
                        <li class="mr-6">
                            <a href="{{ route('login') }}"
                                class="text-gray-200 text-lg font-semibold hover:text-gray-300">Sig in</a>
                        </li>
                    </ul>
                </div>

                <div class="md:hidden">
                    <button id="dropdownMenuButton"
                        class="p-2 text-gray-200 rounded-lg hover:bg-gray-700 focus:outline-none">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>

                    <div id="dropdownMenu"
                        class="absolute right-0 w-48 mt-2 bg-white border border-gray-200 rounded-lg shadow-md hidden">
                        <div class="py-1">
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Toko</a>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tentang
                                Kami</a>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kontak</a>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sigin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-16">
        <h2 class="text-4xl font-bold text-center">Toko Online</h2>
        <p class="text-center mt-4">Temukan berbagai produk kebutuhan anda.</p>


        <div class="mt-10">
            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($barangs as $barang)
                    <li class="col-span-1 bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Product 1"
                            class="h-48 w-full object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-bold mb-2">{{ $barang->nama_barang }}</h2>
                            
                            <p class="text-gray-600 text ">{{ $barang->harga }}</p>
                            <p class="text-gray-600 mb-4">{{ $barang->stock }}</p>
                            <p class="text-gray-600 mb-4">{{ $barang->stock }}</p>
                            <div class="flex">

                                <a href="{{ route('login') }}" class="mx-3 my-2">
                                    <button class="bg-blue-600 text-white px-4 py-2  rounded-md hover:bg-blue-500 ">Add
                                        chart
                                        <svg class="w-6 h-6 ml-2 float-left  text-white-600 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="m17.855 11.273 2.105-7a.952.952 0 0 0-.173-.876 1.042 1.042 0 0 0-.37-.293 1.098 1.098 0 0 0-.47-.104H5.021L4.395.745a.998.998 0 0 0-.376-.537A1.089 1.089 0 0 0 3.377 0H1.053C.773 0 .506.105.308.293A.975.975 0 0 0 0 1c0 .265.11.52.308.707.198.187.465.293.745.293h1.513l.632 2.254v.02l2.105 6.999.785 2.985a3.13 3.13 0 0 0-1.296 1.008 2.87 2.87 0 0 0-.257 3.06c.251.484.636.895 1.112 1.19a3.295 3.295 0 0 0 3.228.12c.5-.258.918-.639 1.208-1.103.29-.465.444-.995.443-1.535a2.834 2.834 0 0 0-.194-1h2.493a2.84 2.84 0 0 0-.194 1c0 .593.186 1.173.533 1.666.347.494.84.878 1.417 1.105a3.314 3.314 0 0 0 1.824.17 3.213 3.213 0 0 0 1.617-.82 2.95 2.95 0 0 0 .864-1.536 2.86 2.86 0 0 0-.18-1.733 3.038 3.038 0 0 0-1.162-1.346 3.278 3.278 0 0 0-1.755-.506h-7.6l-.526-2h9.179c.229 0 .452-.07.634-.201a1 1 0 0 0 .379-.524Zm-2.066 4.725a1.1 1.1 0 0 1 .585.168c.173.11.308.267.388.45.08.182.1.383.06.577a.985.985 0 0 1-.288.512 1.07 1.07 0 0 1-.54.274 1.104 1.104 0 0 1-.608-.057 1.043 1.043 0 0 1-.472-.369.965.965 0 0 1-.177-.555c0-.265.11-.52.308-.707.197-.188.465-.293.744-.293Zm-7.368 1a.965.965 0 0 1-.177.555c-.116.165-.28.293-.473.369a1.104 1.104 0 0 1-.608.056 1.07 1.07 0 0 1-.539-.273.985.985 0 0 1-.288-.512.953.953 0 0 1 .06-.578c.08-.182.214-.339.388-.448a1.092 1.092 0 0 1 1.329.124.975.975 0 0 1 .308.707Zm5.263-8.999h-1.053v1c0 .265-.11.52-.308.707a1.081 1.081 0 0 1-.744.293c-.28 0-.547-.106-.745-.293a.975.975 0 0 1-.308-.707v-1H9.474a1.08 1.08 0 0 1-.745-.293A.975.975 0 0 1 8.421 7c0-.265.11-.52.308-.707.198-.187.465-.293.745-.293h1.052V5c0-.265.111-.52.309-.707.197-.187.465-.292.744-.292.279 0 .547.105.744.292a.975.975 0 0 1 .308.707v1h1.053c.28 0 .547.106.744.293a.975.975 0 0 1 .309.707c0 .265-.111.52-.309.707a1.081 1.081 0 0 1-.744.293Z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
                <!-- Add more products here -->
            </ul>
        </div>
    </div>

    <footer class="bg-gray-800 text-white px-6 py-4">
        <div class="container mx-auto">
            <p>&copy; 2022 - Toko Online. All rights reserved.</p>
        </div>
    </footer>
</body>


<script>
    var dropdown = document.getElementById('dropdownMenuButton');
    var dropdownMenu = document.getElementById('dropdownMenu');

    dropdown.addEventListener('click', function() {
        dropdownMenu.classList.toggle('hidden');
    });
</script>

</html>
