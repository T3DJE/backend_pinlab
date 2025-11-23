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
        Schema::create('data_laporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->json('alat_bahan');
            $table->string('keperluan_praktikum');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->string('kondisi_sebelum')->nullable()->default('B');
            $table->string('kondisi_sesudah')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_laporans');
    }
};
