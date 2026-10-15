<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'quantidade',
        'unidade_medida',
        'valor_total',
        'fornecedor',
        'data_compra',
    ];
}