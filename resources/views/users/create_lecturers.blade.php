<!-- resources/views/lecturers/create.blade.php -->

@extends('layouts.main')
@section('container')
<div class="mx-4 my-8">
    <h1 style="font-size: 30px; font: bold;" class="mb-6 no-select">Add Lecturer</h1>
    <form action="{{ route('users.store_lecturers') }}" method="POST" class="no-select">
        @csrf
        <div class="mb-4">
            <label for="idPengguna" class="block text-gray-700">Lecturer's ID</label>
            <input type="text" name="idPengguna" id="idPengguna" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="namaPengguna" class="block text-gray-700">Lecturer's Name</label>
            <input type="text" name="namaPengguna" id="namapengguna" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Username</label>
            <input type="text" name="username" id="username" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="border border-gray-300 rounded w-full px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="admin" class="block text-gray-700">Admin</label>
            @if($adminData)
            <input type="text" name="admin" id="admin" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $adminData }}" readonly>
            @else
            <span>Tidak ada data admin ditemukan.</span>
            @endif
        </div>

        <input name="role" type="hidden" name="role" id="role" value="Dosen" readonly>

        <button type="submit" class="bg-slate-700 hover:bg-opacity-90 text-white px-4 py-2 rounded">Add Lecturer</button>
    </form>
</div>
@endsection