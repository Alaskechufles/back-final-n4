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
        Schema::create('enlaces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pagina_id')->nullable();
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->string('descripcion_enlace')->nullable();
            $table->timestamps();
            $table->date('usuariocreacion')->nullable();
            $table->date('usuariomodificacion')->nullable();
            $table->foreign('pagina_id')->references('id')->on('paginas');
            $table->foreign('rol_id')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces');
    }
};
