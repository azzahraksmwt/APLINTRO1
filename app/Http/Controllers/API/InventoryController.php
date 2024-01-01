<?php

namespace App\Http\Controllers\API;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'idtype' => 'required|string|max:50',
            'namabarang' => 'required|string|max:50',
            'jenisbarang' => 'required|string|max:50',
            'jumlahbarang' => 'required|integer',
            'satuan' => 'required|string|max:50',
            'uom' => 'nullable|string|max:50',
            // 'modifiedbydate' => 'required|date',
            // 'idPengguna' => 'required|string|max:50',
        ]);

        // Pastikan bahwa nilai jumlahbarang tidak kurang dari 0
        $jumlahbarang = max(0, $request->jumlahbarang);

        // Simpan data ke database
        $inventory = Inventory::create([
            'idtype' => $request->idtype,
            'namabarang' => $request->namabarang,
            'jenisbarang' => $request->jenisbarang,
            'jumlahbarang' => $jumlahbarang,
            'satuan' => $request->satuan,
            'uom' => $request->uom,
            'modifiedbydate' => now(),
            // 'idPengguna' => $request->idPengguna,
            'idPengguna' => auth()->user()->idPengguna,
        ]);

        // return redirect()->route('inventorys.index')->with('success', 'Data barang berhasil ditambahkan');
        return ResponseFormatter::success([
            'inventory' => $inventory
        ], 'Add inventory successfully');
    }

    public function fetch()
    {
        $inventoryItems = Inventory::all();
        return ResponseFormatter::success([
            'inventoryItems' => $inventoryItems
        ], 'Get inventory successfully');
    }

    public function update(Request $request, $idbarang)
    {
        $inventoryItem = Inventory::where('idbarang',$idbarang)->first();
        $inventoryItem->update([
            'idtype'=> $request->idtype ?? $inventoryItem->idtype,
            'namabarang'=> $request->namabarang ?? $inventoryItem->namabarang,
            'jenisbarang'=> $request->jenisbarang ?? $inventoryItem->jenisbarang,
            'satuan'=> $request->satuan ?? $inventoryItem->satuan,
            'uom'=> $request->uom ?? $inventoryItem->uom,
            'modifiedbydate'=> now(),
            'idPengguna'=> auth()->user()->idPengguna
        ]);

        return ResponseFormatter::success([
            'inventoryItem' => $inventoryItem
        ], 'Update inventory successfully');
    }

    public function destroy($idbarang)
    {
        Inventory::destroy($idbarang);

        return ResponseFormatter::success([
            'idbarang' => $idbarang
        ], 'Delete inventory successfully');
    }
}
