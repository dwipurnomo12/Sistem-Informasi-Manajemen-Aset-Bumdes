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
        Schema::create('statuspengadaans', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending', 'disetujui', 'ditolak']);
            $table->text('catatan')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('pengadaan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuspengadaans');
    }
};
