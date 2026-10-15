<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_nome',
        'produto_id',
        'quantidade',
        'valor_total',
        'status',
    ];

    // Relação: Um pedido pertence a um produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}