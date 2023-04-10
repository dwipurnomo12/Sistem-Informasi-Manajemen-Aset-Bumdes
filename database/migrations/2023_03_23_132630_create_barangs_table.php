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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('gambar');
            $table->string('nama');
            $table->text('deskripsi');
            $table->double('harga');
            $table->date('tanggal');
            $table->foreignId('user_id');
            $table->foreignId('kategori_id')->nullable();
            $table->foreignId('lokasi_id')->nullable();
            $table->foreignId('satuan_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
