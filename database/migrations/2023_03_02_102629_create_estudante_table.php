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
            $table->tinynt('is_estudante','1');
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
