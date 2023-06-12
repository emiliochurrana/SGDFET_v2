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
        Schema::create('monografia_downloads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_monografia');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
        });

        Schema::table('monografia_downloads', function (Blueprint $table){
            /**
          * Aqui estamos alterando a tabela e
          * Colocando uma chave estrangeira no 
          * campo que armazena o ID da Defesa
          */

          $table->foreign('id_monografia')->references('id')->on('monografias')->onDelete('cascade');

          /**
           * Aqui estamos alterando a tabela e 
           * colocando uma chave estrangeira no 
           * campo que armazena o ID do Participante
           */
          $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monografia_downloads');
    }
};
