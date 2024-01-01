<?php
// app/Http/Controllers/InventoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\User;

// Controler untuk Lecturers
class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::all();
        return view('inventorys.index', compact('inventoryItems'));
    }

    public function create()
    {
        $users = User::all();
        return view('inventorys.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idtype' => 'required|string|max:50',
            'namabarang' => 'required|string|max:50',
            'jenisbarang' => 'required|string|max:50',
            'jumlahbarang' => 'required|integer',
            'satuan' => 'required|string|max:50',
            'uom' => 'nullable|string|max:50',
            'modifiedbydate' => 'required|date',
            'idPengguna' => 'required|string|max:50',
        ]);

        // Pastikan bahwa nilai jumlahbarang tidak kurang dari 0
        $jumlahbarang = max(0, $request->jumlahbarang);

        // Simpan data ke database
        Inventory::create([
            'idtype' => $request->idtype,
            'namabarang' => $request->namabarang,
            'jenisbarang' => $request->jenisbarang,
            'jumlahbarang' => $jumlahbarang,
            'satuan' => $request->satuan,
            'uom' => $request->uom,
            'modifiedbydate' => $request->modifiedbydate,
            'idPengguna' => $request->idPengguna,
        ]);

        return redirect()->route('inventorys.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show($idbarang)
    {
        $inventoryItem = Inventory::with('user')->where('idbarang', $idbarang)->first();
        return view('inventorys.show', compact('inventoryItem'));
    }

    public function edit($idbarang)
    {
        $inventoryItem = Inventory::find($idbarang);
        $users = User::all();
        return view('inventorys.edit', compact('inventoryItem', 'users'));
    }

    public function update(Request $request, $idbarang)
    {
        $inventoryItem = Inventory::find($idbarang);
        $inventoryItem->update($request->all());

        return redirect()->route('inventorys.index')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy($idbarang)
    {
        Inventory::destroy($idbarang);

        return redirect()->route('inventorys.index')->with('success', 'Data barang berhasil dihapus');
    }


    // Controller untuk Admin
    public function index_admin()
    {
        $inventoryItems = Inventory::all();
        return view('inventorys.index_admin', compact('inventoryItems'));
    }

    public function create_admin()
    {
        $users = User::all();
        return view('inventorys.create_admin', compact('users'));
    }

    public function store_admin(Request $request)
    {
        $request->validate([
            'idtype' => 'required|string|max:50',
            'namabarang' => 'required|string|max:50',
            'jenisbarang' => 'required|string|max:50',
            'jumlahbarang' => 'required|integer',
            'satuan' => 'required|string|max:50',
            'uom' => 'nullable|string|max:50',
            'modifiedbydate' => 'required|date',
            'idPengguna' => 'required|string|max:50',
        ]);

        // Pastikan bahwa nilai jumlahbarang tidak kurang dari 0
        $jumlahbarang = max(0, $request->jumlahbarang);

        // Simpan data ke database
        Inventory::create([
            'idtype' => $request->idtype,
            'namabarang' => $request->namabarang,
            'jenisbarang' => $request->jenisbarang,
            'jumlahbarang' => $jumlahbarang,
            'satuan' => $request->satuan,
            'uom' => $request->uom,
            'modifiedbydate' => $request->modifiedbydate,
            'idPengguna' => $request->idPengguna,
        ]);

        return redirect()->route('inventorys.index_admin')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show_admin($idbarang)
    {
        $inventoryItem = Inventory::with('user')->where('idbarang', $idbarang)->first();
        return view('inventorys.show_admin', compact('inventoryItem'));
    }

    public function edit_admin($idbarang)
    {
        $inventoryItem = Inventory::find($idbarang);
        $users = User::all();
        return view('inventorys.edit_admin', compact('inventoryItem', 'users'));
    }

    public function update_admin(Request $request, $idbarang)
    {
        $inventoryItem = Inventory::find($idbarang);
        $inventoryItem->update($request->all());

        return redirect()->route('inventorys.index_admin')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy_admin($idbarang)
    {
        Inventory::destroy($idbarang);

        return redirect()->route('inventorys.index_admin')->with('success', 'Data barang berhasil dihapus');
    }
}
