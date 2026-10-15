<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('item'); // Ex: Farinha de Trigo, Leite Condensado
            $table->decimal('quantidade', 10, 2); // Ex: 5.00 (Kg, L, un)
            $table->string('unidade_medida')->default('un'); // Ex: kg, g, l, un
            $table->decimal('valor_total', 10, 2); // Ex: 45.50
            $table->string('fornecedor')->nullable(); // Ex: Supermercado X
            $table->date('data_compra');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};