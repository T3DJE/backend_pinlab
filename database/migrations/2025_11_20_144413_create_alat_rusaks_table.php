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
        Schema::create('alat_rusaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat_rusak');
            $table->integer('jumlah_alat_rusak');
            $table->string('keterangan_rusak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_rusaks');
    }
};
