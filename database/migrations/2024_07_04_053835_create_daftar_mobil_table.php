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
        Schema::create('daftar_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('model');
            $table->date('tgl_masuk');
            $table->string('plat_nomer')->unique();
            $table->enum('status_perbaikan', ['Pending', 'Perbaikan', 'Selesai']);
            $table->unsignedBigInteger('penanggung_jawab');
            $table->foreign('penanggung_jawab')->references('id')->on('users');
            $table->string('komponen_kerusakan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_mobil');
    }
};
