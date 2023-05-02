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
        Schema::create('defesa_docente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_defesa');
            $table->unsignedBigInteger('id_oponente');
            $table->unsignedBigInteger('id_presidente');
            $table->timestamps();
        });

        Schema::table('defesa_docente', function (Blueprint $table){

            /**
             * Aqui estamos alterando a tabela e
             * Colocando uma chave estrangeira no 
             * campo que armazena o ID da Defesa
             */

         $table->foreign('id_defesa')->references('id')->on('defesas')->onDelete('cascade');

         /**
          * Aqui estamos alterando a tabela e 
          * colocando uma chave estrangeira no 
          * campo que armazena o ID do Docente
          */
         $table->foreign('id_oponente')->references('id')->on('users')->onDelete('cascade');
         /**
          * Aqui estamos alterando a tabela e 
          * colocando uma chave estrangeira no 
          * campo que armazena o ID do Docente
          */
          $table->foreign('id_presidente')->references('id')->on('users')->onDelete('cascade');
            
        
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defesa_docente');
    }
};