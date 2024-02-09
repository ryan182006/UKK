<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/css/glide.theme.min.css">
    @vite('resources/css/app.css')
</head>

<body class="bg-white">
    <nav class="bg-gray-800 p-4 relative z-10">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="text-white text-2xl font-bold logo">
                    <a href="/">Toko Online</a>
                </div>

                <div class="hidden md:block">
                    <ul class="list-none flex flex-row mt-4 md:mt-0">
                        <li class="mr-6">
                            <a href="{{ route('login') }}"
                                class="text-gray-200 text-lg font-semibold hover:text-gray-300">Home</a>
                        </li>
                        <li class="mr-6">
                            <a href="{{ route('login') }}"
                                class="text-gray-200 text-lg font-semibold hover:text-gray-300">Shop</a>
                        </li>
                        <li class="mr-6">
                            <a href="{{ route('login') }}"
                                class="text-gray-200 text-lg font-semibold hover:text-gray-300">Contact</a>
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
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Home</a>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Shop</a>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contect</a>
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sigin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="glide w-full h-[300px] md:h-[500px] lg:h-[600px] rounded-lg">
        <div class="glide__track w-full h-[300px] md:h-[500px] lg:h-[600px]" data-glide-el="track">
            <ul class="glide__slides w-full h-[300px] md:h-[500px] lg:h-[600px]">
                <li class="glide__slide"><img class="w-full h-full object-cover" src="data:image/jpeg;base64,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" alt="Image 1"></li>
                <li class="glide__slide"><img class="w-full h-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd-ETt9QxodObUGkFPQDl9hIBFYSM8jyTj9w&usqp=CAU" alt="Image 2"></li>
                <li class="glide__slide"><img class="w-full h-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMIa956G5ODqyVmXUePBjgRZtxZZ9Fx_eyPw&usqp=CAU" alt="Image 3"></li>
                <!-- Add more slides as needed -->
            </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                </svg>
            </button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- <div class="bg-transparent p-4 text-black text-center">
        <form action="/search" method="GET" class="mt-4">
            <!-- Updated the class to remove the background -->
            <input type="text" name="query" placeholder="Cari produk..." class="p-2 w-64 rounded-md focus:outline-none border border-gray-900">
            <button type="submit" class="text-white p-2 ml-2 bg-blue-400 rounded-md hover:bg-blue-200">Cari</button>
        </form>
    </div> --}}

    <div class="container mx-auto px-6 py-16">
        <h2 class="text-4xl font-bold text-green-700 shadow-md shadow-black bg-slate-100 text-center">Product kami</h2>
        <p class="text-center mt-4">Temukan berbagai produk kebutuhan anda.</p>
        <div class="mt-10">
            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($barangs as $barang)
                    <li class="col-span-1 bg-white rounded-lg shadow-black shadow-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Product 1" class="h-48 w-full object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-bold mb-2">{{ $barang->nama_barang }}</h2>
                            <p class="text-gray-600 ">Harga: Rp. {{ number_format($barang->harga) }}</p>
                            <p class="text-gray-600 mb-3">Stock: {{ $barang->stock }}</p>
                            <p class="text-gray-600 ">Deskripsi: {{ $barang->deskripsi }}</p>
                            <p class="text-gray-600 mb-4">Berat: {{ $barang->berat }}<span>KG</span></p>
                            <div class="flex">
                                <form action="/cart/{{ $barang->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="many">
                                    <button type="submit"
                                        class="bg-blue-600 text-white px-4 py-2  rounded-md hover:bg-blue-500 ">Add chart
                                        <svg class="w-6 h-6 ml-2 float-left  text-white-600 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="m17.855 11.273 2.105-7a.952.952 0 0 0-.173-.876 1.042 1.042 0 0 0-.37-.293 1.098 1.098 0 0 0-.47-.104H5.021L4.395.745a.998.998 0 0 0-.376-.537A1.089 1.089 0 0 0 3.377 0H1.053C.773 0 .506.105.308.293A.975.975 0 0 0 0 1c0 .265.11.52.308.707.198.187.465.293.745.293h1.513l.632 2.254v.02l2.105 6.999.785 2.985a3.13 3.13 0 0 0-1.296 1.008 2.87 2.87 0 0 0-.257 3.06c.251.484.636.895 1.112 1.19a3.295 3.295 0 0 0 3.228.12c.5-.258.918-.639 1.208-1.103.29-.465.444-.995.443-1.535a2.834 2.834 0 0 0-.194-1h2.493a2.84 2.84 0 0 0-.194 1c0 .593.186 1.173.533 1.666.347.494.84.878 1.417 1.105a3.314 3.314 0 0 0 1.824.17 3.213 3.213 0 0 0 1.617-.82 2.95 2.95 0 0 0 .864-1.536 2.86 2.86 0 0 0-.18-1.733 3.038 3.038 0 0 0-1.162-1.346 3.278 3.278 0 0 0-1.755-.506h-7.6l-.526-2h9.179c.229 0 .452-.07.634-.201a1 1 0 0 0 .379-.524Zm-2.066 4.725a1.1 1.1 0 0 1 .585.168c.173.11.308.267.388.45.08.182.1.383.06.577a.985.985 0 0 1-.288.512 1.07 1.07 0 0 1-.54.274 1.104 1.104 0 0 1-.608-.057 1.043 1.043 0 0 1-.472-.369.965.965 0 0 1-.177-.555c0-.265.11-.52.308-.707.197-.188.465-.293.744-.293Zm-7.368 1a.965.965 0 0 1-.177.555c-.116.165-.28.293-.473.369a1.104 1.104 0 0 1-.608.056 1.07 1.07 0 0 1-.539-.273.985.985 0 0 1-.288-.512.953.953 0 0 1 .06-.578c.08-.182.214-.339.388-.448a1.092 1.092 0 0 1 1.329.124.975.975 0 0 1 .308.707Zm5.263-8.999h-1.053v1c0 .265-.11.52-.308.707a1.081 1.081 0 0 1-.744.293c-.28 0-.547-.106-.745-.293a.975.975 0 0 1-.308-.707v-1H9.474a1.08 1.08 0 0 1-.745-.293A.975.975 0 0 1 8.421 7c0-.265.11-.52.308-.707.198-.187.465-.293.745-.293h1.052V5c0-.265.111-.52.309-.707.197-.187.465-.292.744-.292.279 0 .547.105.744.292a.975.975 0 0 1 .308.707v1h1.053c.28 0 .547.106.744.293a.975.975 0 0 1 .309.707c0 .265-.111.52-.309.707a1.081 1.081 0 0 1-.744.293Z" />
                                        </svg>
                                    </button>
    
                                </form>
    
    
                            </div>
                        </div>
                    </li>
                @endforeach
                <!-- Add more products here -->
            </ul>
        </div>
    </div>

    @include('layout.partialsMain.footer')
</body>


<script>
    var dropdown = document.getElementById('dropdownMenuButton');
    var dropdownMenu = document.getElementById('dropdownMenu');

    dropdown.addEventListener('click', function() {
        dropdownMenu.classList.toggle('hidden');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.4.1/dist/glide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Glide('.glide', {
                type: 'carousel',
                startAt: 0,
                perView: 1,
                autoplay: 3000, // Set to false if you don't want autoplay
                animationTimingFunc: 'ease-in-out', // Add this line for smoother animations
            }).mount();
        });
    </script>
      

</html>
