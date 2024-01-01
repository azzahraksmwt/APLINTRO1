<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Usage;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsageController extends Controller
{

    // BUAT HISTORY
    public function index()
    {
        $inventorys = Inventory::all();
        $usages = Usage::all();
        $usages = Usage::with('validator')->get();
        return view('usages.index', compact('usages'));
    }

    public function create()
    {
        $inventorys = Inventory::all();
        $subjects = Subject::all(); // Pastikan untuk mendapatkan data subjek juga
        return view('usages.create', compact('inventorys', 'subjects'));
    }


    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'quantity_pinjam' => 'required|integer',
            'quantity_kembali' => 'nullable|integer',
            'kondisi_barang' => 'nullable|string|max:50',
            'status_pemakaian' => 'nullable|string|max:50',
            'status_pengembalian' => 'nullable|string|max:50',
            'validasi_pemakaian' => 'nullable|string|max:50',
            'validasi_pengembalian' => 'nullable|string|max:50',
            'brg_rusak' => 'nullable|integer',
            'foto' => 'nullable|string|max:50',
            'idPengguna' => 'required|string|max:50',
            'idbarang' => 'required|integer',
            'idMatakuliah' => 'required|string|max:50',
        ]);

        // Simpan data penggunaan ke database
        Usage::create($request->all());

        return redirect()->route('usages.index_validation')
            ->with('success', 'Penggunaan berhasil ditambahkan.');
    }

    public function show(Usage $usage)
    {
        // Tampilkan halaman detail untuk penggunaan tertentu
        return view('usages.show', compact('usage'));
    }

    public function edit(Usage $usage)
    {
        $inventorys = Inventory::all();
        $subjects = Subject::all();

        return view('usages.edit', compact('usage', 'inventorys', 'subjects'));
    }

    public function update(Request $request, Usage $usage)
    {
        // Validasi input dari form
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'quantity_pinjam' => 'required|integer',
            'quantity_kembali' => 'nullable|integer',
            'kondisi_barang' => 'nullable|string|max:50',
            'status_pemakaian' => 'nullable|string|max:50',
            'status_pengembalian' => 'nullable|string|max:50',
            'validasi_pemakaian' => 'nullable|string|max:50',
            'validasi_pengembalian' => 'nullable|string|max:50',
            'brg_rusak' => 'nullable|integer',
            'foto' => 'nullable|string|max:50',
            'idPengguna' => 'required|string|max:50',
            'idbarang' => 'required|integer',
            'idMatakuliah' => 'required|string|max:50',
        ]);

        // Perbarui data penggunaan di database
        $usage->update($request->all());

        return redirect()->route('usages.index')
            ->with('success', 'Penggunaan berhasil diperbarui.');
    }

    public function destroy(Usage $usage)
    {
        // Hapus data penggunaan dari database
        $usage->delete();

        return redirect()->route('usages.index')
            ->with('success', 'Penggunaan berhasil dihapus.');
    }


    // BUAT VALIDASI
    public function index_validation()
    {
           // Ambil data penggunaan yang memiliki status_pemakaian 'Menunggu Validasi'
           $usages = Usage::where('status_pemakaian', 'Menunggu Validasi')->get();

           // Kirim data ke view
           return view('usages.index_validation', compact('usages'));
    }

    public function show_validation(Usage $usage)
    {
        // Tampilkan halaman detail untuk penggunaan tertentu
        return view('usages.show_validation', compact('usage'));
    }


    // BUAT USAGE STUDENT
    public function index_student()
    {
        // Ambil idPengguna dari pengguna yang sedang login
        $idPengguna = Auth::user()->idPengguna;

        // Ambil data penggunaan berdasarkan idPengguna
        $usages = Usage::where('idPengguna', $idPengguna)->get();

        // Kirim data ke view
        return view('usages.index', compact('usages'));
    }
}
