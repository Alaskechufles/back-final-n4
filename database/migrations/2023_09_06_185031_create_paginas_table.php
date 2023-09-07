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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable();
            $table->string('estado')->nullable();
            $table->string('nombre_pagina')->nullable();
            $table->string('descripcion')->nullable();
            $table->binary('icono')->nullable();
            $table->string('tipo')->nullable();
            $table->date('usuariocreacion')->nullable();
            $table->date('usuariomodificacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
