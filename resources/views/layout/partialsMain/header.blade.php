<nav class="bg-gray-800 p-4 relative z-10">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <div class="text-white text-2xl font-bold logo">
                <a href="/" class="text-green-500">V<span class="m-1">Fresh</span></a>
            </div>

            <div class="hidden md:block">
                <ul class="list-none flex flex-row mt-4 md:mt-0">
                    <li class="mr-6">
                        <a href="{{ route('home') }}"
                            class="text-gray-200 text-lg font-semibold hover:text-gray-300">Home</a>
                    </li>
                    <li class="mr-6">
                        <span></span>
                        <a href="{{ route('shop') }}"
                            class="text-gray-200 text-lg font-semibold hover:text-gray-300">Shop</a>
                    </li>
                    <li class="mr-6">
                        <a href="/pesanan/panding"
                            class="text-gray-200 text-lg font-semibold hover:text-gray-300">Tentang
                            Kami</a>
                    </li>
                    <li class="mr-6">
                        <a href="/cart" class="text-gray-200 text-lg font-semibold hover:text-gray-300">
                            <span
                                class="inline-flex items-center justify-center w-3 h-1 p-3  text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $jumlah }}</span>
                            <svg class="w-4 h-5  float-left mt-1  text-white-600 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m17.855 11.273 2.105-7a.952.952 0 0 0-.173-.876 1.042 1.042 0 0 0-.37-.293 1.098 1.098 0 0 0-.47-.104H5.021L4.395.745a.998.998 0 0 0-.376-.537A1.089 1.089 0 0 0 3.377 0H1.053C.773 0 .506.105.308.293A.975.975 0 0 0 0 1c0 .265.11.52.308.707.198.187.465.293.745.293h1.513l.632 2.254v.02l2.105 6.999.785 2.985a3.13 3.13 0 0 0-1.296 1.008 2.87 2.87 0 0 0-.257 3.06c.251.484.636.895 1.112 1.19a3.295 3.295 0 0 0 3.228.12c.5-.258.918-.639 1.208-1.103.29-.465.444-.995.443-1.535a2.834 2.834 0 0 0-.194-1h2.493a2.84 2.84 0 0 0-.194 1c0 .593.186 1.173.533 1.666.347.494.84.878 1.417 1.105a3.314 3.314 0 0 0 1.824.17 3.213 3.213 0 0 0 1.617-.82 2.95 2.95 0 0 0 .864-1.536 2.86 2.86 0 0 0-.18-1.733 3.038 3.038 0 0 0-1.162-1.346 3.278 3.278 0 0 0-1.755-.506h-7.6l-.526-2h9.179c.229 0 .452-.07.634-.201a1 1 0 0 0 .379-.524Zm-2.066 4.725a1.1 1.1 0 0 1 .585.168c.173.11.308.267.388.45.08.182.1.383.06.577a.985.985 0 0 1-.288.512 1.07 1.07 0 0 1-.54.274 1.104 1.104 0 0 1-.608-.057 1.043 1.043 0 0 1-.472-.369.965.965 0 0 1-.177-.555c0-.265.11-.52.308-.707.197-.188.465-.293.744-.293Zm-7.368 1a.965.965 0 0 1-.177.555c-.116.165-.28.293-.473.369a1.104 1.104 0 0 1-.608.056 1.07 1.07 0 0 1-.539-.273.985.985 0 0 1-.288-.512.953.953 0 0 1 .06-.578c.08-.182.214-.339.388-.448a1.092 1.092 0 0 1 1.329.124.975.975 0 0 1 .308.707Zm5.263-8.999h-1.053v1c0 .265-.11.52-.308.707a1.081 1.081 0 0 1-.744.293c-.28 0-.547-.106-.745-.293a.975.975 0 0 1-.308-.707v-1H9.474a1.08 1.08 0 0 1-.745-.293A.975.975 0 0 1 8.421 7c0-.265.11-.52.308-.707.198-.187.465-.293.745-.293h1.052V5c0-.265.111-.52.309-.707.197-.187.465-.292.744-.292.279 0 .547.105.744.292a.975.975 0 0 1 .308.707v1h1.053c.28 0 .547.106.744.293a.975.975 0 0 1 .309.707c0 .265-.111.52-.309.707a1.081 1.081 0 0 1-.744.293Z" />
                            </svg>
                        </a>
                    </li>
                    <li class="mr-6 item-center justify-center my-1">
                        <a href="/pesanan" class=" text-gray-200 text-lg font-semibold hover:text-gray-300">
                            <svg class="w-4 h-5 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 16 20">
                                <path
                                    d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z" />
                            </svg>
                        </a>
                    </li><li class="relative group mr-6" onclick="toggleDropdownProfile()">
                        <a href="#" class="text-gray-200 text-lg font-semibold hover:text-gray-300">{{auth()->user()->name}}</a>
                        <ul id="dropdown"
                            class="absolute right-0 w-48 mt-2 bg-white border border-gray-200 rounded-lg shadow-md hidden">
                            <li><a href="{{ route('ViewProfile') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View Profile</a>
                            </li>
                            <li class="mr-6">
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center p- text-gray-200 rounded-lg hover:bg-gray-700 group">
                                        <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 group-hover:text-gray-300"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 18 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Sign Out</span>
                                    </button>
                                </form>

                            </li>

                            <!-- Tambahkan opsi dropdown sesuai kebutuhan -->
                        </ul>
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
                        <a href="{{ route('home') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Home</a>
                        <a href="{{ route('shop') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Shop</a>
                        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contact</a>
                        <a href="/cart"
                            class="text-black-200 block px-4 py-2 text-lg font-semibold hover:text-gray-300">
                            <span
                                class="inline-flex items-center justify-center w-3 h-1 p-3  text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $jumlah }}</span>
                            <svg class="w-4 h-5  float-left mt-1  text-white-600 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m17.855 11.273 2.105-7a.952.952 0 0 0-.173-.876 1.042 1.042 0 0 0-.37-.293 1.098 1.098 0 0 0-.47-.104H5.021L4.395.745a.998.998 0 0 0-.376-.537A1.089 1.089 0 0 0 3.377 0H1.053C.773 0 .506.105.308.293A.975.975 0 0 0 0 1c0 .265.11.52.308.707.198.187.465.293.745.293h1.513l.632 2.254v.02l2.105 6.999.785 2.985a3.13 3.13 0 0 0-1.296 1.008 2.87 2.87 0 0 0-.257 3.06c.251.484.636.895 1.112 1.19a3.295 3.295 0 0 0 3.228.12c.5-.258.918-.639 1.208-1.103.29-.465.444-.995.443-1.535a2.834 2.834 0 0 0-.194-1h2.493a2.84 2.84 0 0 0-.194 1c0 .593.186 1.173.533 1.666.347.494.84.878 1.417 1.105a3.314 3.314 0 0 0 1.824.17 3.213 3.213 0 0 0 1.617-.82 2.95 2.95 0 0 0 .864-1.536 2.86 2.86 0 0 0-.18-1.733 3.038 3.038 0 0 0-1.162-1.346 3.278 3.278 0 0 0-1.755-.506h-7.6l-.526-2h9.179c.229 0 .452-.07.634-.201a1 1 0 0 0 .379-.524Zm-2.066 4.725a1.1 1.1 0 0 1 .585.168c.173.11.308.267.388.45.08.182.1.383.06.577a.985.985 0 0 1-.288.512 1.07 1.07 0 0 1-.54.274 1.104 1.104 0 0 1-.608-.057 1.043 1.043 0 0 1-.472-.369.965.965 0 0 1-.177-.555c0-.265.11-.52.308-.707.197-.188.465-.293.744-.293Zm-7.368 1a.965.965 0 0 1-.177.555c-.116.165-.28.293-.473.369a1.104 1.104 0 0 1-.608.056 1.07 1.07 0 0 1-.539-.273.985.985 0 0 1-.288-.512.953.953 0 0 1 .06-.578c.08-.182.214-.339.388-.448a1.092 1.092 0 0 1 1.329.124.975.975 0 0 1 .308.707Zm5.263-8.999h-1.053v1c0 .265-.11.52-.308.707a1.081 1.081 0 0 1-.744.293c-.28 0-.547-.106-.745-.293a.975.975 0 0 1-.308-.707v-1H9.474a1.08 1.08 0 0 1-.745-.293A.975.975 0 0 1 8.421 7c0-.265.11-.52.308-.707.198-.187.465-.293.745-.293h1.052V5c0-.265.111-.52.309-.707.197-.187.465-.292.744-.292.279 0 .547.105.744.292a.975.975 0 0 1 .308.707v1h1.053c.28 0 .547.106.744.293a.975.975 0 0 1 .309.707c0 .265-.111.52-.309.707a1.081 1.081 0 0 1-.744.293Z" />
                            </svg>
                        </a>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
