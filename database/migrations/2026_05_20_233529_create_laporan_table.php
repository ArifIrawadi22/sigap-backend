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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('kategori', 50);
            $table->string('judul', 200);
            $table->text('deskripsi')->nullable();
            $table->string('foto', 255)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->enum('keparahan', ['ringan', 'sedang', 'parah'])->default('sedang');
            $table->string('kecamatan', 200)->nullable();
            $table->string('nama_pelapor', 100);
            $table->string('no_wa', 20);
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu');
            $table->integer('upvote_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
