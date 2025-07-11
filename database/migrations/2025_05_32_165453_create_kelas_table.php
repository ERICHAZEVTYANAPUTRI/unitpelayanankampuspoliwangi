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
Schema::create('kelas', function (Blueprint $table) {
    $table->id();
    $table->string('nama'); // e.g. "TI 2A"
    $table->unsignedBigInteger('prodi_id');
    $table->unsignedBigInteger('adminjurusan_id');
    $table->timestamps();
    $table->foreign('adminjurusan_id')
        ->references('id')->on('users')
        ->onDelete('cascade');
    $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};