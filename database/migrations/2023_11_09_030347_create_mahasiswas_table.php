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
            $table->foreign('doswal')->references('id')->on('users')->onDelete('cascade');
            $table->string('alamat')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->year('angkatan')->nullable();
            $table->string('jalur_masuk')->nullable();
            $table->enum('status', ['Aktif','Cuti','Mangkir','Do','Undur_diri','Lulus','Meninggal_dunia'])->default('Aktif');
            $table->string('foto')->nullable()->default('/assets/compiled/jpg/1.jpg');
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
