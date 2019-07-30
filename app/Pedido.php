<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = [
        'produto_id',
        'qtd',
        'valor_unitario',
        'data',
        'solicitante',
        'endereco',
        'despachante',
        'situacao_id',
    ];

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
