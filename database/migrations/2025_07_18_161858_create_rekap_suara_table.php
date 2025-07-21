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
        Schema::create('rekap_suara', function (Blueprint $table) {
            $table->id('id_rekap');
            $table->string('nim', 20);
            $table->unsignedBigInteger('id_kandidat');
            $table->timestamps();

            $table->foreign('id_kandidat')->references('id_kandidat')->on('kandidat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_suara');
    }
};
