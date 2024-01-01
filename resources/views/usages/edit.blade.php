@extends('layouts.main')
@section('container')
<div class="mx-4 my-8">
    <h1 style="font-size: 30px; font: bold;" class="mb-6 no-select">Usage Info</h1>

    <form action="{{ route('usages.update', $usage->idpb) }}" method="POST" class="no-select" id="usageForm">
        @csrf
        @method('PUT')

        <input type="hidden" name="idPengguna" id="idPengguna" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $usage->idPengguna }}" readonly>
        <input type="hidden" name="validasi_pemakaian" id="validasi_pemakaian" class="border border-gray-300 rounded w-full px-3 py-2" value="{{Auth::user()->idPengguna}}" readonly>
        <input type="hidden" name="status_pemakaian" id="status_pemakaian" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $usage->status_pemakaian }}" readonly>
        <input type="hidden" name="status_pengembalian" id="status_pengembalian" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $usage->status_pengembalian }}" readonly>

        <div class="mb-4">
            <label for="idpb" class="block text-gray-700">Usage ID</label>
            <div class="border border-gray-300 rounded px-3 py-2" readonly>{{ $usage->idpb }}</div>
        </div>        

        <div class="mb-4">
            <label for="idbarang" class="block text-gray-700">Name of Goods</label>
            <input type="text" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $usage->inventory->namabarang }}" readonly>
            <input type="hidden" name="idbarang" value="{{ $usage->inventory->idbarang }}">
        </div>        

        <div class="mb-4">
            <label for="jumlahbarang" class="block text-gray-700">Quantity Available</label>
            <input type="text" name="jumlahbarang" id="jumlahbarang" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $usage->inventory->jumlahbarang }}" readonly>
        </div>

        <div class="mb-4">
            <label for="quantity_pinjam" class="block text-gray-700">Quantity Borrowed</label>
            <input type="text" name="quantity_pinjam" id="quantity_pinjam" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $usage->quantity_pinjam }}" readonly>
        </div>

        <div class="mb-4">
            <label for="tanggal_pinjam" class="block text-gray-700">Borrowed Date</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $usage->tanggal_pinjam }}" readonly>
        </div>

        <div class="mb-4">
            <label for="idMatakuliah" class="block text-gray-700">Subject</label>
            <input type="text" name="idMatakuliah" id="idMatakuliah" class="border border-gray-300 rounded w-full px-3 py-2" value="{{ $usage->subject->namaMatakuliah}}" readonly>
            <input type="hidden" name="idMatakuliah" value="{{ $usage->subject->idMatakuliah }}">
        </div>
        <a href="{{ route('usages.index_validation') }}" class="bg-slate-700 text-white px-4 py-2 rounded-md">Cancel</a>
        <button type="button" onclick="tolakPemakaian()" class="bg-slate-700 text-white px-4 py-2 rounded-lg">Tolak</button>
        <button type="button" onclick="terimaPemakaian()" class="bg-slate-700 text-white px-4 py-2 rounded-lg">Validasi</button>

    </form>

</div>
<script>
    function tolakPemakaian() {
        // Mengubah nilai status_pemakaian sebelum mengirim formulir
        document.getElementById('status_pemakaian').value = 'Ditolak';
        // Mengirim formulir setelah mengubah nilai
        document.getElementById('usageForm').submit();
    }
</script>

<script>
    function terimaPemakaian() {
        // Mengubah nilai status_pemakaian sebelum mengirim formulir
        document.getElementById('status_pemakaian').value = 'Tervalidasi';

        document.getElementById('status_pengembalian').value = 'Dipakai';
        // Mengirim formulir setelah mengubah nilai
        document.getElementById('usageForm').submit();
    }
</script>

@endsection
