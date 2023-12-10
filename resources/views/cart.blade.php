@extends('layout.Main')
@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>

    <div class="border rounded-lg overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Item</th>
                    <th class="p-2">Price</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Total</th>
                    <th class="p-2">Remove</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-2">Item 1</td>
                    <td class="p-2">$10</td>
                    <td class="p-2">
                        <div class="flex">
                            <button class="bg-gray-200 px-2 py-1 rounded-l">-</button>
                            <span class="bg-gray-200 px-2 py-1">1</span>
                            <button class="bg-gray-200 px-2 py-1 rounded-r">+</button>
                        </div>
                    </td>
                    <td class="p-2">$10</td>
                    <td class="p-2">
                        <button class="bg-red-500 text-white px-2 py-1 rounded">Remove</button>
                    </td>
                </tr>
                <!-- Add more items here -->
            </tbody>
        </table>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-bold mb-4">Cart Summary</h2>
        <p class="mb-2">Subtotal: <span class="font-bold">$10</span></p>
        <p class="mb-2">Shipping: <span class="font-bold">$5</span></p>
        <p class="mb-2">Tax: <span class="font-bold">$3</span></p>
        <h3 class="text-2xl font-bold mb-4">Total: <span class="font-bold">$28</span></h3>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Checkout</button>
    </div>
</div>
@endsection