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
        Schema::table('alat_berat', function (Blueprint $table) {
            $table->string('status_perbaikan')->default('Pending')->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alat_berat', function (Blueprint $table) {
            $table->dropColumn('status_perbaikan');
        });
    }
};
