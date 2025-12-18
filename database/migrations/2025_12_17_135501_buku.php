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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->string('sumber');
            $table->integer('eksemplar');
            $table->date('tanggal_terima');
            $table->text('sinopsis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ini adalah tempat untuk membatalkan (rollback) perubahan pada migration, 
        // biasanya dengan menghapus tabel yang sudah dibuat pada metode up().
        Schema::dropIfExists('buku');
    }
};
