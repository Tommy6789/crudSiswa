<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman_bukus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_siswa');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status',['pinjam','kembali','ready']);
            $table->timestamps();

            $table->foreign('id_buku')->references('id')->on('bukus');
            $table->foreign('id_siswa')->references('id')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_bukus');
    }
};
