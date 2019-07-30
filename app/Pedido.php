<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = [
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
