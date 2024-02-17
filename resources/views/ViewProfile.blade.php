@extends('layout.Main')
@section('content')
<div class="container mx-auto mt-10 p-6 bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center mb-4">Profil Saya</h1>
    <div class="flex justify-center items-center">
        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto Profil" class="w-32 h-32 rounded-full">
    </div>
    <div class="mt-4">
        <p class="text-lg font-semibold">Nama:</p>
        <p>{{ Auth::user()->name }}</p>
    </div>
    <div class="mt-4">
        <p class="text-lg font-semibold">Email:</p>
        <p>{{ Auth::user()->email }}</p>
    </div>
    <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
    <div class="mt-4">
        <p class="text-lg font-semibold">Informasi Kontak:</p>
        <p>Telepon: {{ auth()->user()->no_telp }}</p>
        <p>Alamat: {{ Auth::user()->address ?? '-' }}</p>
    </div>
    <div class="mt-4">
        <p class="text-lg font-semibold">Tanggal Bergabung:</p>
        <p>{{ Auth::user()->created_at->format('d M Y') }}</p>
    </div>
    <div class="mt-6">
        <a href="{{ route('ViewProfile') }}" class="text-blue-500">Edit Profil</a>
    </div>
</div>
<div class="container mx-auto mt-10 p-6 bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-center mb-4">Profil Saya</h1>
    <form action="{{ route('ViewProfile') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Nama</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="mt-1 p-2 w-full sm:w-2/3 lg:w-1/2 xl:w-1/3 border rounded-md">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="mt-1 p-2 w-full sm:w-2/3 lg:w-1/2 xl:w-1/3 border rounded-md">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-600">Foto Profil</label>
            <input type="file" id="photo" name="photo" accept="image/*" class="mt-1 p-2 w-full sm:w-2/3 lg:w-1/2 xl:w-1/3 border rounded-md">
        </div>
        <!-- Tambahkan formulir lain sesuai kebutuhan -->
        <div class="mb-4">
            <label for="currentPassword" class="block text-sm font-medium text-gray-600">Kata Sandi Saat Ini</label>
            <input type="password" id="currentPassword" name="currentPassword" class="mt-1 p-2 w-full sm:w-2/3 lg:w-1/2 xl:w-1/3 border rounded-md">
        </div>
        <div class="mb-4">
            <label for="newPassword" class="block text-sm font-medium text-gray-600">Kata Sandi Baru</label>
            <input type="password" id="newPassword" name="newPassword" class="mt-1 p-2 w-full sm:w-2/3 lg:w-1/2 xl:w-1/3 border rounded-md">
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection