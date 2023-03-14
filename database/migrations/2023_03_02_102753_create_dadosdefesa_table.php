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
        Schema::create('dadosdefesa', function (Blueprint $table) {
            $table->id();
            $table->string('nome_estudante');
            $table->string('foto');
            $table->string('declaracao_nota');
            $table->string('monografia');
            $table->string('curriculum');
            $table->foreignId('id_estudante')->constrained('estudante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dadosdefesa');
    }
};
