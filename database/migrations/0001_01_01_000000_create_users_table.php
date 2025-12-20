<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_anggota', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->date('tanggal_lahir');
            $table->string('no_hp')->unique();
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kota');
            $table->string('role')->default('anggota'); // tambah kolom role dengan default 'anggota'
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
