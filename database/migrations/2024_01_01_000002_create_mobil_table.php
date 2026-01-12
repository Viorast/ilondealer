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
        Schema::create('mobil', function (Blueprint $table) {
            $table->id('id_mobil');
            $table->string('nama_mobil', 100);
            $table->enum('tipe', ['Sedan', 'SUV', 'MPV', 'Hatchback']);
            $table->year('tahun_produksi');
            $table->decimal('harga', 15, 2);
            $table->string('warna', 50);
            $table->string('kapasitas_baterai', 50)->nullable();
            $table->string('jarak_tempuh', 50)->nullable();
            $table->string('waktu_charging', 50)->nullable();
            $table->string('transmisi', 30)->default('Automatic');
            $table->integer('stok')->default(0);
            $table->string('foto', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
