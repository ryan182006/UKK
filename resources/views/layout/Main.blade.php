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
                <button @click="isOpen = !isOpen" class="block text-gray-800 hover:text-gray-600 focus:text-gray-600 focus:outline-none">
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
                        <a href="" class="text-gray-800 text-lg font-semibold hover:text-gray-600">Tentang Kami</a>
                    </li>
                    <li class="mr-6">
                        <a href="" class="text-gray-800 text-lg font-semibold hover:text-gray-600">Kontak</a>
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