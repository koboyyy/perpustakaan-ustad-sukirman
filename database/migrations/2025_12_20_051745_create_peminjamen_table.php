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
        Schema::create('tbl_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota');
            $table->foreignId('id_admin');
            $table->date('tanggal_pinjam');
            $table->enum('status', ['dipinjam', 'dikembalikan', 'hilang', 'rusak'])->default('dipinjam');
            $table->timestamps();

            // ENUM (singkatan dari "enumeration") adalah tipe data khusus pada database (dan juga di banyak bahasa pemrograman) yang memungkinkan sebuah kolom hanya memiliki nilai tertentu yang telah didefinisikan sebelumnya.
            // Contoh pada kolom 'status' di atas: nilainya hanya boleh salah satu dari 'dipinjam', 'dikembalikan', 'hilang', atau 'rusak'.
            // ENUM berguna untuk menjaga konsistensi data, sehingga tidak ada nilai yang tidak valid masuk ke kolom tersebut.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
