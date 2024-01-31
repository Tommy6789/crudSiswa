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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku')->nullable();
            $table->date('tahun_terbit')->nullable();
            $table->string('isbn')->nullable();
            $table->unsignedBigInteger('id_penulis')->nullable();
            $table->string('genre')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('id_penulis')->references('id')->on('penulis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
