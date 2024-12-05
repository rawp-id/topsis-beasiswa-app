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
        Schema::create('pekerjaan_ortus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_id')->nullable()->constrained('kriterias')->onUpdate('cascade')->onDelete('set null');
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->integer('bobot')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_ortus');
    }
};
