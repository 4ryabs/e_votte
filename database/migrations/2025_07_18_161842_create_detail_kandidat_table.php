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
        Schema::create('detail_kandidat', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kandidat');
            $table->string('nim', 20);
            $table->string('jabatan', 10);
            $table->timestamps();

            $table->foreign('id_kandidat')->references('id_kandidat')->on('kandidat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kandidat');
    }
};
