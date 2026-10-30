<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelapor_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('sekolah_id')->constrained('schools')->cascadeOnDelete();
            $table->foreignId('distribusi_id')->constrained('distributions')->cascadeOnDelete();
            $table->text('deskripsi_kejadian');
            $table->string('status')->default('menunggu'); // menunggu, ditinjau, diteruskan
            $table->string('file_bukti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
