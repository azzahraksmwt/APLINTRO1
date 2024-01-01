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
        Schema::create('inventorys', function (Blueprint $table) {
            $table->bigIncrements('idbarang');
            $table->string('idtype', 50);
            $table->string('namabarang', 50);
            $table->string('jenisbarang', 50);
            $table->integer('jumlahbarang');
            $table->string('satuan', 50);
            $table->string('uom', 50)->nullable();
            $table->date('modifiedbydate');
            $table->string('idPengguna', 50);
            $table->timestamps();
             // Menambahkan foreign key
             $table->foreign('idPengguna')->references('IdPengguna')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventorys');
    }
};
