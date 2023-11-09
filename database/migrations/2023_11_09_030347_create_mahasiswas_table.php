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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('doswal')->unsigned();
            $table->foreign('doswal')->references('id')->on('dosen_walis')->onDelete('cascade');
            $table->string('alamat');
            $table->string('kab_kota');
            $table->string('provinsi');
            $table->string('no_hp');
            $table->string('email');
            $table->string('angkatan');
            $table->string('jalur_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
