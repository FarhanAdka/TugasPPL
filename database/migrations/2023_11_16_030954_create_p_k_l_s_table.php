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
        Schema::create('p_k_l_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mahasiswa')->unsigned();
            $table->foreign('id_mahasiswa')->references('id')->on('users')->onDelete('cascade');
            $table->string('tanggal_lulus')->nullable();
            $table->float('nilai')->nullable();
            $table->boolean('status')->default(false);
            $table->string('scan_pkl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_k_l_s');
    }
};
