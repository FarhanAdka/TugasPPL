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
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->foreign('id_mahasiswa')->references('id')->on('users')->onDelete('cascade');
            $table->float('nilai')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('semester')->nullable();
            $table->string('tanggal_lulus')->nullable();
            $table->integer('lama_studi')->nullable();
            $table->string('scan_skripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsis');
    }
};
