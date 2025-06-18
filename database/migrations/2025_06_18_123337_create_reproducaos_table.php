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
        Schema::create('reproducaos', function (Blueprint $table) {
            $table->id();
            // Cria a chave estrangeira para a tabela 'musicas'
            $table->foreignId('musica_id')->constrained()->onDelete('cascade');
            $table->date('data_reproducao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reproducaos');
    }
};
