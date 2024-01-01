<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Usage;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsageController extends Controller
{
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
                $usage = Usage::create([
            'tanggal_pinjam'=> now(),
            'tanggal_kembali'=> $request->input('tanggal_kembali'),
            'quantity_pinjam'=> $request->input('quantity_pinjam'),
            'quantity_kembali'=> $request->input('quantity_kembali'),
            'kondisi_barang'=> $request->input('kondisi_barang'),
            'status_pemakaian'=> $request->input('status_pemakaian'),
            'status_pengembalian'=> $request->input('status_pengembalian'),
            'validasi_pemakaian'=> $request->input('validasi_pemakaian'),
            'validasi_pengembalian'=> $request->input(''),
            'brg_rusak'=> $request->input('brg_rusak'),
            'idPengguna'=> auth('')->user()->id,
            'idbarang'=> $request->input('idbarang'),
            'idMatakuliah'=> $request->input('idMatakuliah'),
        ]);

        // Simpan data penggunaan ke database
        if ($request->hasFile('foto')) {
            $usage->foto = $request->foto->store('file', 'public');
        }

        $usage->save();
        $invetoryData = Inventory::where('idbarang',$request->idbarang)->first();
        $result = DB::table('inventorys')
    ->where('idbarang', 1)
    ->first();
    dd($result);
// $count = $invetoryData->jumlahbarang - 7;

        $invetoryData->update([
            'jumlahbarang'=>$invetoryData->jumlahbarang - $request->quantity_pinjam
        ]);

        DB::commit();
        return ResponseFormatter::success([
            'usage' => $usage
        ], 'Add usage successfully');
    }catch(Exception $e){
        DB::rollBack();
        return ResponseFormatter::error([
            'error'=> $e->getMessage()
        ]);
    }
}
}