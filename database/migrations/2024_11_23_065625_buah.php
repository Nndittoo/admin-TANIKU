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
        Schema::create('buahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_buah');
            $table->longText('deskripsi');
            $table->longText('poto_buah');
            $table->longText('updated_at')->nullable();
            $table->longText('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buahs');
    }
};
