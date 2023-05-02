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
        Schema::create('defesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudante');
            $table->string('autor');
            $table->string('tema');
            $table->string('curso');
            $table->text('resumo');
            $table->string('nivel');
            $table->string('supervisor');
            $table->string('oponente');
            $table->string('presidente');
            $table->string('sala');
            $table->string('data');
            $table->string('hora');
            $table->timestamps();
        });

        Schema::table('defesas', function(Blueprint $table){
            
            $table->foreign('id_estudante')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('defesas');

    }
};
