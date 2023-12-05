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
        Schema::create('galerias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_drcurso');
            $table->string('foto');
            $table->string('titulo');
            $table->text('descricao');
            $table->timestamps();
        });
        Schema::table('galerias', function (Blueprint $table){
            $table->foreign('id_drcurso')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galerias');
    }
};