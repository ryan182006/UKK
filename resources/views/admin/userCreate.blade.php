@extends('layout.admin')
@section('content')
    <div class="flex justify-between ">
        <h1 class="text-2xl font-bold mb-2">Tambah Product</h1>
    </div>
    <div>
        <a href="/user" class="text-gray-300 hover:text-black"><svg class="w-6 h-6 text-gray-400 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 5H1m0 0 4 4M1 5l4-4" />
            </svg></a>
        <form class="" action="/user" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama</label>
                <input type="text" id="name" name="name"
                    class="w-full border border-gray-300 p-2 rounded  @error('name') is-invalid @enderror"
                    placeholder="Masukkan Nama ">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full border border-gray-300 p-2 rounded  @error('email') is-invalid @enderror"
                    placeholder="Masukkan Email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full border border-gray-300 p-2 rounded  @error('password') is-invalid @enderror"
                    placeholder="Masukkan Password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <h1>Role</h1>
                <input type="radio" class="form-check-inline @error('role') is-invalid @enderror" name="role"
                    id="role" placeholder="Role" value="admin" autofocus>admin
                <br>
                <input type="radio" class="form-check-inline @error('role') is-invalid @enderror" name="role"
                    id="role" placeholder="Role" value="user" autofocus>user
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Buat
                    Data</button>
            </div>
        </form>
    </div>
@endsection
