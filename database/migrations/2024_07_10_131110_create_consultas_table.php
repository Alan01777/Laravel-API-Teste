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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('medico_id')->constrained('medicos');
            $table->foreignId('paciente_id')->constrained('pacientes');
            $table->dateTime('data_agendamento');
            $table->dateTime('data_consulta');
            $table->string('motivo');
            $table->string('observacoes');
            $table->string('medicamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
