<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3 md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <div>
                    <a href="" class="text-gray-800 text-xl font-bold md:text-2xl">
                        Toko Online
                    </a>
                </div>
            </div>

            <div class="md:hidden">
                <button @click="isOpen = !isOpen"
                    class="block text-gray-800 hover:text-gray-600 focus:text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div :class="isOpen ? 'block' : 'hidden'" class="hidden md:block">
                <ul class="list-none flex flex-row mt-4 md:mt-0">
                    <li class="mr-6">
                        <a href="" class="text-gray-800 text-lg font-semibold hover:text-gray-600">Beranda</a>
                    </li>
                    <li class="mr-6">
                        <a href="" class="text-gray-800 text-lg font-semibold hover:text-gray-600">Toko</a>
                    </li>
                    <li class="mr-6">
                        <a href="" class="text-gray-800 text-lg font-semibold hover:text-gray-600">Tentang
                            Kami</a>
                    </li>
                    <li class="mr-6">
                        <a href="" class="text-gray-800 text-lg font-semibold hover:text-gray-600">Kontak</a>
                    </li>
                    <li class="mr-6">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit"
                                class="flex items-center p-  text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
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
</body>

</html>
