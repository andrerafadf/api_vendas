<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table = 'pedido_produtos';
    protected $fillable = [
        'nome',
        'valor',
        'qtd',
        'produto_id',
        'pedido_id',
    ];
}
