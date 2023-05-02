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
        Schema::create('estudantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_docente');
            $table->string('num_estudante');
            $table->string('foto');
            $table->string('curso');
            $table->string('supervisor');
            $table->string('regime');
            $table->integer('ano_ingresso');
            $table->timestamps();
        });

        Schema::table('estudantes', function(Blueprint $table){

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            
            $table->foreign('id_docente')->references('id')->on('users')->onDelete('cascade');  

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudantes');

    }
};