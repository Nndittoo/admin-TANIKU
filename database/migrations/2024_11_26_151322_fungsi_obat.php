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
        Schema::create('fungsi_obats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_obat')->constrained('obats')->cascadeOnDelete();

            $table->text('poto_fungsi')->nullable();
            $table->text('fungsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fungsi_obat');
    }
};
