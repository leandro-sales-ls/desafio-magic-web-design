<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $table = 'vendas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'dt_venda','nome','cpf','email','cod_produto','qtd_prod_venda','valor_total',
    ];

}



