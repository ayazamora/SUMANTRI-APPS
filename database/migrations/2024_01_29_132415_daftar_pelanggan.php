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
        Schema::create('dPelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('karyawan');
            $table->string('nama_karyawan');
            $table->string('nama');
            $table->string('nomor_telepon');
            $table->string('karyawan');
            $table->text('alamat');
            $table->string('layanan');
            $table->string('jenis');
            $table->string('harga');
            $table->string('masuk');
            $table->string('keluar');
            $table->enum('status',  ['Selesai', 'Pending', 'Prosess'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dPelanggan');
    }
};
