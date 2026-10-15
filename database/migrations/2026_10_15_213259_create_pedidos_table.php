<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_nome'); // Nome de quem comprou
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade'); // Produto escolhido
            $table->integer('quantidade'); // Quantidade de unidades
            $table->decimal('valor_total', 10, 2); // Valor calculado (preço unitário * quantidade)
            $table->string('status')->default('Pendente'); // Pendente, Concluído, Cancelado
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};