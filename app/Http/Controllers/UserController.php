<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //controller untuk Lectures
    public function index_lecturers()
    {
        $users = User::all();
        return view('users.index_lecturers', compact('users'));
    }

    public function create_lecturers()
    {
        $adminData = User::getAdmin();
        return view('users.create_lecturers', compact('adminData'));
    }


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

    public function edit_lecturers($id)
    {
        $users = User::findOrFail($id);
        $adminData = User::getAdmin();
        return view('users.edit_lecturers', compact('users', 'adminData'));
    }

    public function update_lecturers(Request $request, $id)
    {
        $user = User::findOrFail($id);
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
        $data = $request->all();
        $hashedPassword = bcrypt($request->input('password'));
        $data['password'] = $hashedPassword;
        $user->update($data);
        return redirect()->route('users.index_lecturers');
    }

    public function show_lecturers($id)
    {
        $user = User::findOrFail($id);
        return view('users.show_lecturers', compact('user'));
    }

    public function destroy_lecturers($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index_lecturers');
    }

    //controller unutuk students
    public function index_students()
    {
        $users = User::all();
        return view('users.index_students', compact('users'));
    }

    public function create_students()
    {
        $adminData = User::getAdmin();
        return view('users.create_students', compact('adminData'));
    }

    public function store_students(Request $request)
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

        return redirect()->route('users.index_students');
    }

    public function edit_students($id)
    {
        $users = User::findOrFail($id);
        $adminData = User::getAdmin();
        return view('users.edit_students', compact('users', 'adminData'));
    }

    public function update_students(Request $request, $id)
    {
        $user = User::findOrFail($id);
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
        $data = $request->all();
        $hashedPassword = bcrypt($request->input('password'));
        $data['password'] = $hashedPassword;
        $user->update($data);
        return redirect()->route('users.index_students');
    }

    public function show_students($id)
    {
        $user = User::findOrFail($id);
        return view('users.show_students', compact('user'));
    }

    public function destroy_students($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index_students');
    }
}
