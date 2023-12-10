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
                            <a href="" class="text-gray-200 text-lg font-semibold hover:text-gray-300">Toko</a>
                        </li>
                        <li class="mr-6">
                            <a href="" class="text-gray-200 text-lg font-semibold hover:text-gray-300">Tentang
                                Kami</a>
                        </li>
                        <li class="mr-6">
                            <a href="" class="text-gray-200 text-lg font-semibold hover:text-gray-300">Kontak</a>
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
                            <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Toko</a>
                            <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tentang
                                Kami</a>
                            <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kontak
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                    <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
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

    <div class="container mx-auto px-6 py-16">
        <h2 class="text-4xl font-bold text-center">Toko Online</h2>
        <p class="text-center mt-4">Temukan berbagai produk kebutuhan anda.</p>


        <main>
            @yield('content')
        </main>
    </div>

    <footer class="bg-gray-800 text-white px-6 py-4">
        <div class="container mx-auto">
            <p>&copy; 2022 - Toko Online. All rights reserved.</p>
        </div>
    </footer>


    <script>
        var dropdown = document.getElementById('dropdownMenuButton');
        var dropdownMenu = document.getElementById('dropdownMenu');

        dropdown.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
