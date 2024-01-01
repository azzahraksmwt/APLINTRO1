@extends('layouts.main')
@section('container')
<div class="mx-4 my-8">
    <h1 style="font-size: 30px; font: bold;" class="mb-6 no-select">Usage Form</h1>

    <form action="{{ route('usages.store') }}" method="POST" class="no-select" id="usageForm">
        @csrf

        <input type="hidden" name="idpb" id="idpb" class="border border-gray-300 rounded w-full px-3 py-2" readonly>
        <input type="hidden" name="idPengguna" id="idPengguna" class="border border-gray-300 rounded w-full px-3 py-2" value="{{Auth::user()->idPengguna}}" required readonly>
        <input type="hidden" name="status_pemakaian" id="status_pemakaian" class="border border-gray-300 rounded w-full px-3 py-2" value="Menunggu Validasi" readonly>

        <div class="mb-4">
            <label for="idbarang" class="block text-gray-700">Name of Goods</label>
            <select name="idbarang" id="idbarang" class="border border-gray-300 rounded w-full px-3 py-2" required>
                <option value="" disabled selected>--choose--</option>
                @foreach ($inventorys as $inventory)
                    <option value="{{ $inventory->idbarang }}" jumlah-barang="{{ $inventory->jumlahbarang }}">{{ $inventory->namabarang }} {{ $inventory->uom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlahbarang" class="block text-gray-700">Quantity Available</label>
            <input type="text" name="jumlahbarang" id="jumlahbarang" class="border border-gray-300 rounded w-full px-3 py-2" disabled>
        </div>

        <div class="mb-4">
            <label for="quantity_pinjam" class="block text-gray-700">Quantity Borrowed</label>
            <input type="text" name="quantity_pinjam" id="quantity_pinjam" class="border border-gray-300 rounded w-full px-3 py-2" required>
            <span id="quantityError" class="text-red-500"></span>
        </div>

        <div class="mb-4">
            <label for="tanggal_pinjam" class="block text-gray-700">Borrowed Date</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="border border-gray-300 rounded w-full px-3 py-2" required readonly>
        </div>

        <div class="mb-4">
            <label for="idMatakuliah" class="block text-gray-700">Subjects</label>
            <select name="idMatakuliah" id="idMatakuliah" class="border border-gray-300 rounded w-full px-3 py-2" required>
                <option value="" disabled selected>--choose--</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->idMatakuliah }}">{{ $subject->namaMatakuliah }}</option>
                @endforeach
            </select>
        </div>

        <button type="button" onclick="validateQuantity()" class="bg-slate-700 text-white px-4 py-2 rounded-lg">Add Usage</button>
    </form>

    <script>
        document.getElementById('idbarang').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('jumlahbarang').value = selectedOption.getAttribute('jumlah-barang');
        });

        function validateQuantity() {
            var borrowedQuantity = parseInt(document.getElementById('quantity_pinjam').value);
            var availableQuantity = parseInt(document.getElementById('jumlahbarang').value);

            if (borrowedQuantity > availableQuantity) {
                document.getElementById('quantityError').innerText = "cannot borrow goods in excess of the available quantity";
            } else {
                document.getElementById('quantityError').innerText = "";
                document.getElementById('usageForm').submit();
            }
        }
    </script>
</div>
@endsection