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
            $table->float('nilai');
            $table->boolean('status')->default(false);
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
