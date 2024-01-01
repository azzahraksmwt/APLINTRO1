<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects'; // Ganti 'nama_tabel_anda' sesuai dengan nama tabel yang sesuai
    protected $primaryKey = 'idMatakuliah'; // Jika nama kolom primary key berbeda, sesuaikan di sini
    protected $keyType = 'string';
    public $incrementing = false; // Jika primary key bukan incrementing (contoh: UUID), atur menjadi false

    protected $fillable = [
        'idMatakuliah',
        'namaMatakuliah',
    ];

    // ... kode lainnya ...
}
