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
        Schema::create('kilos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_buah')->constrained('buahs')->cascadeOnDelete();
            $table->foreignId('id_pajak')->constrained('pajaks')->cascadeOnDelete();

            $table->text('nama_kilo');
            $table->string('nama_pemilik');
            $table->string('hp');
            $table->string('jam_buka');
            $table->longText('poto_kilo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kilo');
    }
};
