@extends('layouts.main')
@section('container')
    <div class="mx-4 my-8">
        <h1 style="font-size:30px; font:bold;" class="mb-6 no-select">Usage History</h1>

        <table class="w-full bg-white rounded-md overflow-hidden shadow-md no-select" style="font-size:15px; font:bold;">
            <thead class="bg-slate-700 text-white">
                <tr>
                    <th class="py-2 px-4 border-b">Usage ID</th>
                    <th class="py-2 px-4 border-b">Name of Goods</th>
                    <th class="py-2 px-4 border-b">Type</th>
                    <th class="py-2 px-4 border-b">Borrowed Date</th>
                    <th class="py-2 px-4 border-b">Borrowed QTY</th>
                    <th class="py-2 px-4 border-b">Student</th>
                    <th class="py-2 px-4 border-b">Subject</th>
                    <th class="py-2 px-4 border-b">Usage Validator</th>
                    <th class="py-2 px-4 border-b">Return Validator</th>
                    <th class="py-2 px-4 border-b">Usage Status</th>
                    <th class="py-2 px-4 border-b">Return Status</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usages as $item)
                    <tr class="{{ $loop->odd ? 'bg-gray-200' : 'bg-gray-300' }}">
                        <td class="py-2 px-4 border-b text-center">{{ $item->idpb }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->inventory->namabarang }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->inventory->jenisbarang }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->tanggal_pinjam }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->quantity_pinjam }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->user->namaPengguna }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item->subject->namaMatakuliah }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            @if ($item->validator)
                                {{ $item->validator->namaPengguna }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b text-center">
                            @if ($item->returnValidator)
                                {{ $item->returnValidator->namaPengguna }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td
                            class="py-2 px-4 border-b text-center
                                    @if ($item->status_pemakaian == 'Menunggu Validasi') text-yellow-500
                                    @elseif($item->status_pemakaian == 'Ditolak') text-red-500
                                    @elseif($item->status_pemakaian == 'Tervalidasi') text-green-500 @endif
                                ">
                            {{ $item->status_pemakaian }}
                        </td>
                        <td
                        class="py-2 px-4 border-b text-center
                                @if ($item->status_pengembalian == 'Dipakai') text-yellow-500
                                @elseif($item->status_pengembalian == 'Dikembalikan') text-green-500 @endif
                            ">
                        {{ $item->status_pengembalian }}
                    </td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{ route('inventorys.edit', $item->idbarang) }}" class="text-blue-500 underline italic">Return Goods</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
