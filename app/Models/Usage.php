<?php

namespace App\Models;

use App\Models\Inventory;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;
    protected $table = 'usages';
    protected $primaryKey = 'idpb'; // Sesuaikan dengan primary key yang digunakan
    public $incrementing = true; // Jika primary key bukan incrementing, atur menjadi false
    protected $keyType = 'integer';
    protected $fillable = [
        'idpb',
        'tanggal_pinjam',
        'tanggal_kembali',
        'quantity_pinjam',
        'quantity_kembali',
        'kondisi_barang',
        'status_pemakaian',
        'status_pengembalian',
        'validasi_pemakaian',
        'validasi_pengembalian',
        'brg_rusak',
        'foto',
        'idPengguna',
        'idbarang',
        'idMatakuliah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idPengguna', 'idPengguna');
    }

    // Di dalam model Usage
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($usage) {
            // Memanggil event UpdateInventory setiap kali data Usage disimpan
            event(new \App\Events\UpdateInventory($usage));
        });
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'idbarang', 'idbarang');
    }

    public function validator()
    {
        return $this->belongsTo(User::class, 'validasi_pemakaian', 'idPengguna');
    }

    // Relasi ke model User sebagai validator pengembalian
    public function returnValidator()
    {
        return $this->belongsTo(User::class, 'validasi_pengembalian', 'idPengguna');
    }

    // Relasi ke model Matakuliah
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'idMatakuliah', 'idMatakuliah');
    }
}
