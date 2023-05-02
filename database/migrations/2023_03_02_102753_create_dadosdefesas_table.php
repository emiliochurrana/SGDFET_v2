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
        Schema::create('dadosdefesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudante');
            $table->string('name')->unique();
            $table->string('bi');
            $table->string('declaracao_nota');
            $table->string('monografia');
            $table->string('curriculum');
            $table->timestamps();
        });

        Schema::table('dadosdefesas', function(Blueprint $table){
            
            $table->foreign('id_estudante')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dadosdefesas');
    }
};
