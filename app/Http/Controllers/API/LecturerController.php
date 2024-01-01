<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LecturerController extends Controller
{
    public function store_lecturers(Request $request)
    {
        $request->validate([
            'idPengguna' => 'required|string|max:50',
            'namaPengguna' => 'required|string|max:50',
            'kelas' => 'nullable|string|max:50',
            'nohp' => 'nullable|string|max:20',
            'angkatan' => 'nullable|integer',
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:255', // Hapus bcrypt() di sini
            'admin' => 'nullable|string|max:50',
            'role' => 'required|string|max:225',
        ]);

        // Hash password sebelum menyimpan ke database
        $hashedPassword = bcrypt($request->input('password'));

        // Tambahkan hashed password ke data request
        $data = $request->all();
        $data['password'] = $hashedPassword;

        User::create($data);

        return redirect()->route('users.index_lecturers');
    }
}
