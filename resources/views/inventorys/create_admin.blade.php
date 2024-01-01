<!-- resources/views/inventory/create.blade.php -->

@extends('layouts.main')
@section('container')
<div class="mx-4 my-8">
    <h1 style="font-size: 30px; font: bold;" class="mb-6 no-select">Add Inventory Item</h1>

    <form action="{{ route('inventorys.store_admin') }}" method="POST" class="no-select">
        @csrf

        <input type="hidden" name="idtype" id="idtype" class="border border-gray-300 rounded-l w-full px-3 py-2" style="width: 40px;" required readonly>
        <input type="hidden" name="idbarang" id="idbarang" class="border border-gray-300 rounded-r w-full px-3 py-2" readonly>
        <input type="hidden" name="idPengguna" id="idPengguna" class="border border-gray-300 rounded w-full px-3 py-2" value="{{Auth::user()->idPengguna}}" required readonly>

        <div class="mb-4">
            <label for="namabarang" class="block text-gray-700">Name</label>
            <input type="text" name="namabarang" id="namabarang" class="border border-gray-300 rounded w-full px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="uom" class="block text-gray-700">Unit of Measure</label>
            <input type="text" name="uom" id="uom" class="border border-gray-300 rounded w-full px-3 py-2" nullable>
        </div>

        <div class="mb-4">
            <label for="jenisbarang" class="block text-gray-700">Type</label>
            <select name="jenisbarang" id="jenisbarang" class="border border-gray-300 rounded w-full px-3 py-2" required onchange="updateIdType()">
                <option value="" disabled selected>--choose--</option>
                <option value="material">Material</option>
                <option value="tool">Tool</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlahbarang" for="satuan" class="block text-gray-700">Quantity</label>
            <div class="flex">
                <input type="text" name="jumlahbarang" id="jumlahbarang" class="border border-gray-300 rounded-l w-full px-3 py-2" required>
                <input type="text" name="satuan" id="satuan" class="border border-gray-300 rounded-r w-full px-3 py-2" style="width: 50px;" value="pcs" required readonly>
            </div>
        </div>

        <div class="mb-4">
            <label for="modifiedbydate" class="block text-gray-700">Last Modified Date</label>
            <input type="date" name="modifiedbydate" id="modifiedbydate" class="border border-gray-300 rounded w-full px-3 py-2" required readonly>
        </div>
      
        <button type="submit" class="bg-slate-700 text-white px-4 py-2 rounded-lg">Add Item</button>
    </form>
</div>
@endsection