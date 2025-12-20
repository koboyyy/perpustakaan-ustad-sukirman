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
        Schema::create('tbl_buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->foreignId('id_penerbit');
            $table->foreignId('id_rak');
            $table->foreignid('id_sumber');
            $table->foreignId('id_kategori');
            $table->integer('eksemplar')->unsigned();
            $table->date('tanggal_terima');
            $table->text('sinopsis')->nullable();
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
