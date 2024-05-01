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
        Schema::create('beneficios', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->integer('id_programa');
            $table->integer('monto');
            $table->date('fecha_recepcion');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficios');
    }
};
