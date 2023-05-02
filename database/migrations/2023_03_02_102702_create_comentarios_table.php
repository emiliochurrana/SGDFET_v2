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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudante');
            $table->string('name');
            $table->string('email');
            $table->text('mensagem');
            $table->boolean('is_estudante');
            $table->boolean('is_visitante');
            $table->timestamps();
        });

        Schema::table('comentarios', function(Blueprint $table){
            
            $table->foreign('id_estudante')->references('id')->on('users')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
