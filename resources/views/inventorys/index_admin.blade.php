<!-- resources/views/inventory/index.blade.php -->

@extends('layouts.main')
@section('container')
    <div class="mx-4 my-8">
        <h1 style="font-size:30px; font:bold;" class="mb-6 no-select">Inventory Items</h1>

        <a href="{{ route('inventorys.create_admin') }}" class="bg-slate-700 hover:bg-opacity-90 text-white px-4 py-2 rounded-md mb-4 inline-block">Add Item</a>

        <table class="w-full bg-white rounded-md overflow-hidden shadow-md no-select" style="font-size:15px; font:bold;">
            <thead class="bg-slate-700 text-white">
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Unit of Measure</th>
                    <th class="py-2 px-4 border-b">Type</th>
                    <th class="py-2 px-4 border-b">Quantity</th>
                    <th class="py-2 px-4 border-b">Last Modified Date</th>
                    <th class="py-2 px-4 border-b">Lecturer</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventoryItems as $item)
                    <tr class="{{ $loop->odd ? 'bg-gray-200' : 'bg-gray-300' }}">
                        <td class="py-2 px-4 border-b text-center">{{ $item->idtype }}-{{ $item->idbarang }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->namabarang }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->uom }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->jenisbarang }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ max(0, $item->jumlahbarang) }} {{ $item->satuan }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->modifiedbydate }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->user->namaPengguna }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{ route('inventorys.edit_admin', $item->idbarang) }}" class="text-yellow-500">Edit</a>
                            <span class="mx-1">|</span>
                            <form action="{{ route('inventorys.destroy_admin', $item->idbarang) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
