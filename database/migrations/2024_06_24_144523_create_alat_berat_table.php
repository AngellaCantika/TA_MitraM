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
        Schema::create('alat_berat', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('model');
            $table->date('tanggal_masuk');
            $table->string('komponen_kerusakan');
            $table->unsignedBigInteger('penanggung_jawab'); // User ID of the mechanic
            $table->string('foto')->nullable(); // URL to the photo
            $table->timestamps();

            $table->foreign('penanggung_jawab')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_berat');
    }
};
