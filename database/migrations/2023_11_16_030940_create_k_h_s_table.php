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
        Schema::create('k_h_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->foreign('id_mahasiswa')->references('id')->on('users')->onDelete('cascade');
            $table->integer('semester_aktif');
            $table->integer('jumlah_sks');
            $table->integer('sks_kumulatif');
            $table->float('ip');
            $table->float('ipk');
            $table->boolean('status')->default(false);
            $table->string('scan_khs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k_h_s');
    }
};
