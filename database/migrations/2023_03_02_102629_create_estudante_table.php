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
        Schema::create('estudante', function (Blueprint $table) {
            $table->id();
            $table->string('num_estudante');
            $table->string('regime');
            $table->integer('ano_ingresso');
            $table->string('supervisor');
            $table->string('curso');
            $table->boolean('is_estudante','1');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_curso')->constrained('curso');
            $table->foreignId('id_docente')->constrained('docente');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudante');
    }
};
