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
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('nama');
            $table->string('asal_sekolah');
            $table->string('nomor_induk');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->string('alamat');
            $table->string('no_hp');
            $table->foreignId('Pekerjaan_Ortu_id')->nullable()
                ->constrained('pekerjaan_ortus')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('Tanggungan_Ortu_id')->nullable()
                ->constrained('tanggungan_ortus')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('Penghasilan_Ortu_id')->nullable()
                ->constrained('penghasilan_ortus')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('Nilai_id')->nullable()
                ->constrained('nilais')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('Usia_Orangtua_id')->nullable()
                ->constrained('usia_ortus')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswas');
    }
};
