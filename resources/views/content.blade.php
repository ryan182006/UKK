@extends('layout.Main')

@section('content')

<div class="glide w-full h-[300px] md:h-[500px] lg:h-[600px] rounded-lg">
    <div class="glide__track w-full h-[300px] md:h-[500px] lg:h-[600px]" data-glide-el="track">
        <ul class="glide__slides w-full h-[300px] md:h-[500px] lg:h-[600px]">
            <li class="glide__slide"><img class="w-full h-full object-cover" src="{{asset('banner/1.jpeg')}}" alt="Image 1"></li>
            <li class="glide__slide"><img class="w-full h-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd-ETt9QxodObUGkFPQDl9hIBFYSM8jyTj9w&usqp=CAU" alt="Image 2"></li>
            <li class="glide__slide"><img class="w-full h-full object-cover" src="" alt="Image 3"></li>
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
    <h2 class="text-4xl font-bold text-green-700 shadow-md shadow-black bg-slate-100 text-center">Our Product</h2>
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
                        <p class="text-gray-600 mb-4">Berat: {{ $barang->berat }}<span>gram</span></p>
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
@endsection

@section('script')
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
@endsection

