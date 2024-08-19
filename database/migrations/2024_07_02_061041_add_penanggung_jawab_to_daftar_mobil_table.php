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
        Schema::table('daftar_mobil', function (Blueprint $table) {
            $table->unsignedBigInteger('penanggung_jawab')->nullable()->after('status_perbaikan');
            $table->foreign('penanggung_jawab')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_mobil', function (Blueprint $table) {
            $table->dropForeign(['penanggung_jawab']);
            $table->dropColumn('penanggung_jawab');
        });
    }
};

