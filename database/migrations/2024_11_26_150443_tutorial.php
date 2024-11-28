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
        Schema::create('tutorials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_buah')->nullable()->constrained('buahs')->cascadeOnDelete();
            $table->foreignId('id_obat')->nullable()->constrained('obats')->cascadeOnDelete();

            $table->text('creator');
            $table->text('photo_creator');
            $table->string('judul');
            $table->string('deskripsi');
            $table->longText('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutorial');
    }
};
