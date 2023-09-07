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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->string('usuario')->nullable();
            $table->string('clave')->nullable();
            $table->string('habilitado')->nullable();
            $table->date('fecha')->nullable();
            $table->timestamps();
            $table->date('usuariocreacion')->nullable();
            $table->date('usuariomodificacion')->nullable();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('rol_id')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
