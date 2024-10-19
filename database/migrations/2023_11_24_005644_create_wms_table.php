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
        Schema::create('wms', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->string('nisn', 6);
            $table->string('ttl', 45);
            $table->string('jk', 45);
            $table->string('alamat', 100);
            $table->string('nama_ayah', 45);
            $table->string('nama_ibu', 45);
            $table->string('pekerjaan_ayah', 45);
            $table->string('pekerjaan_ibu', 45);
            $table->string('alamat_wali', 100);
            $table->string('no_telp_wali', 45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wms');
    }
};
