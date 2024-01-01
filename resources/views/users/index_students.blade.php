@extends('layouts.main')

@section('container')
    <div class="mx-4 my-8">
        <h1 style="font-size:30px; font:bold;" class="mb-6 no-select">Student List</h1>

        <a href="{{ route('users.create_students') }}" class="bg-slate-700 hover:bg-opacity-90 text-white px-4 py-2 rounded-md mb-4 inline-block">Add Students</a>

        <table class="w-full bg-white rounded-md overflow-hidden shadow-md no-select" style="font-size:15px; font:bold;">
        <thead class="bg-slate-700 text-white">
                <tr>
                    <th class="py-2 px-4 border-b">NIM</th>
                    <th class="py-2 px-4 border-b">Student's Name</th>
                    <th class="py-2 px-4 border-b">Class</th>
                    <th class="py-2 px-4 border-b">Generation</th>
                    <th class="py-2 px-4 border-b">Call-Number</th>
                    <th class="py-2 px-4 border-b">Username</th>
                    <th class="py-2 px-4 border-b">Admin</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
        <tbody>
            @foreach($users as $pengguna)
                @if($pengguna->role == 'Mahasiswa')
                    <tr class="{{ $loop->odd ? 'bg-gray-200' : 'bg-gray-300' }}">
                        <td class="py-2 px-4 border-b text-center">{{ $pengguna->idPengguna }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $pengguna->namaPengguna }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $pengguna->kelas }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $pengguna->angkatan }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $pengguna->nohp }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $pengguna->username }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $pengguna->admin }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{ route('users.edit_students', $pengguna->idPengguna) }}" class="text-yellow-500">Edit</a>
                            <a class="mx-1">|</a>
                            <form action="{{ route('users.destroy_students', $pengguna->idPengguna) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
