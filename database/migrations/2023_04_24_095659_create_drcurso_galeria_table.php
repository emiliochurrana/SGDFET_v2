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
        Schema::create('drcurso_galeria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_drcurso');
            $table->unsignedBigInteger('id_galeria');
            $table->timestamps();
        });

        Schema::table('drcurso_galeria', function (Blueprint $table){

            $table->foreign('id_drcurso')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_galeria')->references('id')->on('galerias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drcurso_galeria');
    }
};
