<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usages', function (Blueprint $table) {
            $table->id('idpb');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable();
            $table->integer('quantity_pinjam');
            $table->integer('quantity_kembali')->nullable();
            $table->string('kondisi_barang', 50)->nullable();
            $table->string('status_pemakaian', 50)->nullable();
            $table->string('status_pengembalian', 50)->nullable();
            $table->string('validasi_pemakaian', 50)->nullable();
            $table->string('validasi_pengembalian', 50)->nullable();
            $table->integer('brg_rusak')->nullable();
            $table->string('foto', 50)->nullable();
            $table->string('idPengguna', 50);
            $table->bigInteger('idbarang')->unsigned();
            $table->string('idMatakuliah', 50);
            $table->timestamps();

            // $table->foreign('idPengguna')->references('idPengguna')->on('users');
            // $table->foreign('idbarang')->references('idbarang')->on('inventorys');
            $table->foreign('validasi_pemakaian')->references('idPengguna')->on('users');
            $table->foreign('validasi_pengembalian')->references('idPengguna')->on('users');
            $table->foreign('idMatakuliah')->references('idMatakuliah')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usages');
    }
};
