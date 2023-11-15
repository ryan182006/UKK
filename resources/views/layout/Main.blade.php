<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>

    <header class="bg-blue-500 p-4 flex justify-between items-center text-white">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">E-commerce Store</h1>
            <p>Your one-stop shop for all your needs.</p>
        </div>

        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="">
                <i class=""></i>
                <span>Sign Out</span>
            </button>
        </form>

    </header>
    
    <!-- Main Content -->
    <div class="container mx-auto my-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Product 1 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <img src="" alt="Product 1" class="w-full h-32 object-cover mb-4">
                <h2 class="text-lg font-semibold">Product 1</h2>
                <p class="text-gray-600">$19.99</p>
                <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add to Cart</button>
            </div>
    
            <!-- Product 2 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <img src="product2.jpg" alt="Product 2" class="w-full h-32 object-cover mb-4">
                <h2 class="text-lg font-semibold">Product 2</h2>
                <p class="text-gray-600">$29.99</p>
                <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add to Cart</button>
            </div>
    
            <!-- Product 3 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <img src="product3.jpg" alt="Product 3" class="w-full h-32 object-cover mb-4">
                <h2 class="text-lg font-semibold">Product 3</h2>
                <p class="text-gray-600">$39.99</p>
                <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add to Cart</button>
            </div>
    
            <!-- Product 4 -->
            <div class="bg-white p-4 shadow-md rounded-lg">
                <img src="product4.jpg" alt="Product 4" class="w-full h-32 object-cover mb-4">
                <h2 class="text-lg font-semibold">Product 4</h2>
                <p class="text-gray-600">$49.99</p>
                <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Add to Cart</button>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="bg-gray-200 py-4">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} E-commerce Store. All rights reserved.
        </div>
    </footer>
</body>
</html>