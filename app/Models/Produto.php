<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'estoque',
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'estoque' => 'integer',
    ];
}