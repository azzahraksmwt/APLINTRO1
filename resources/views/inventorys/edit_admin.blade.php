<!-- resources/views/inventory/edit.blade.php -->

@extends('layouts.main')
@section('container')
<div class="mx-4 my-8">
    <h1 style="font-size: 30px; font: bold;" class="mb-6 no-select">Edit Inventory Item</h1>

    <form action="{{ route('inventorys.update_admin', $inventoryItem->idbarang) }}" method="POST" class="no-select">
        @csrf
        @method('PUT')

        <!-- <div class="mb-4">
            <label for="idtype" for="idbarang" class="block text-gray-700">ID</label>
            <div class="flex">
                <input type="text" name="idtype" id="idtype" class="border border-gray-300 rounded-l w-full px-3 py-2" style="width: 40px;" value="{{ $inventoryItem->idtype }}" required readonly>
                <input type="text" name="idbarang" id="idbarang" class="border border-gray-300 rounded-r w-full px-3 py-2" value="{{ $inventoryItem->idbarang }}" readonly>
            </div>
        </div> -->

        <div class="mb-4">
            <label for="namabarang" class="block text-gray-700">Name</label>
            <input type="text" name="namabarang" id="namabarang" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $inventoryItem->namabarang }}" required>
        </div>

        <div class="mb-4">
            <label for="jenisbarang" class="block text-gray-700">Type</label>
            <select name="jenisbarang" id="jenisbarang" class="border border-gray-300 rounded w-full px-3 py-2" required onchange="updateIdType()">
                <option value="tool" {{ $inventoryItem->jenisbarang === 'tool' ? 'selected' : '' }}>Tool</option>
                <option value="material" {{ $inventoryItem->jenisbarang === 'material' ? 'selected' : '' }}>Material</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlahbarang" for="satuan" class="block text-gray-700">Quantity</label>
            <div class="flex">
                <input type="text" name="jumlahbarang" id="jumlahbarang" class="border border-gray-300 rounded-l w-full px-3 py-2" value="{{ $inventoryItem->jumlahbarang }}" required>
                <input type="text" name="satuan" id="satuan" class="border border-gray-300 rounded-r w-full px-3 py-2" style="width: 50px;" value="pcs" required readonly>
            </div>
        </div>

        <div class="mb-4">
            <label for="uom" class="block text-gray-700">Unit of Measure</label>
            <input type="text" name="uom" id="uom" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $inventoryItem->uom }}">
        </div>

        <div class="mb-4">
            <label for="modifiedbydate" class="block text-gray-700">Last Modified Date</label>
            <input type="date" name="modifiedbydate" id="modifiedbydate" class="border border-gray-300 rounded w-full px-3 py-2" required readonly>
        </div>

        <input type="hidden" name="idPengguna" id="idPengguna" class="border border-gray-300 rounded w-full px-3 py-2" value="{{Auth::user()->idPengguna}}" required readonly>
        
        <a href="{{ route('inventorys.index_admin') }}" class="bg-slate-700 text-white px-4 py-2 rounded-md">Cancel</a>
        <button type="submit" class="bg-slate-700 text-white px-4 py-2 rounded-md">Update Item</button>
    </form>
</div>
@endsection