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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('idPengguna', 50)->unique();
            $table->string('namaPengguna', 50);
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('kelas', 50)->nullable();
            $table->string('nohp', 20)->nullable();
            $table->integer('angkatan')->nullable();
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('admin', 50)->nullable();
            $table->string('role', 50);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
