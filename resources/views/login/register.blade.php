@extends('layout.users')
@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md p-6   rounded-lg shadow-xl shadow-black">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Register</h2>
            @if(session('message'))
            <div class="mb-4 rounded-lg bg-orange-50 px-6 py-5 text-base text-red-600" role="alert">
                {{session('message')}}
            </div>
            @endif

            <form method="POST" action="{{ route('createRegister') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-600 text-sm font-medium mb-2">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-indigo-200">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-indigo-200">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-indigo-200">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation"
                        class="block text-gray-600 text-sm font-medium mb-2">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-indigo-200">
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="w-full py-2 px-4 text-white bg-emerald-600 rounded hover:bg-emerald-700 focus:outline-none focus:ring focus:ring-indigo-200">Register</button>
                </div>

                <p class="text-sm text-center text-gray-600">
                    Already have an account? <a href="{{route('login')}}"
                        class="text-blue-700 hover:text-indigo-800">Login</a>
                </p>
            </form>
        </div>
    </div>
@endsection