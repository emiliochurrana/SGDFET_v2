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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_drcurso');
            $table->string('nome');
            $table->string('foto');
            $table->string('curso');
            $table->string('curriculum');
            $table->timestamps();
        });

        Schema::table('docentes', function(Blueprint $table){

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            
            $table->foreign('id_drcurso')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
