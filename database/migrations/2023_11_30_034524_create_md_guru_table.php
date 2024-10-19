<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('md_guru', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('md_id');
            $table->unsignedBigInteger('guru_id');

            $table->foreign('md_id')->references('id')->on('mds')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_guru');
    }
};
