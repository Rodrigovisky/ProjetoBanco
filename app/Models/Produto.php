<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

   protected $fillable = [
    'sabor',
    'ingredientes',
    'valor_unitario',
    'quantidade_disponivel',
];

protected $casts = [
    'valor_unitario' => 'decimal:2',
    'quantidade_disponivel' => 'integer',
];
}