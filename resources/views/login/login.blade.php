@extends('layout.users')
@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md p-6 bg-white-200 rounded-lg shadow-2xl">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login</h2>

            <form method="POST" action="{{route('prosesLogin')}}">
                @csrf

                @if (session()->has('error'))
                <div class="mb-4 rounded-lg bg-orange-100 px-6 py-5 text-base text-red-600" role="alert">
                {{ session('error') }}
              </div>
                @endif

                <div class="mb-4">
                    <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-indigo-200">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-indigo-200">
                </div>

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                            class="text-indigo-600 border-gray-300 focus:ring focus:ring-indigo-200 rounded">
                        <span class="ml-2 text-sm text-gray-600">Remember Me</span>
                    </label>
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="w-full py-2 px-4 text-white bg-emerald-600 rounded hover:bg-emerald-700 focus:outline-none focus:ring focus:ring-indigo-200">Login</button>
                </div>

                <p class="text-sm text-center text-gray-600">
                    Don't have an account? <a href="{{ route('register') }}"
                        class="text-indigo-600 hover:text-indigo-800">Register</a>
                </p>
            </form>
        </div>
    </div>
@endsection
