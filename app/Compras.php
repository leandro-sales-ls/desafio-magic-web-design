<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id';

    protected $fillable = [
        'dt_compra','cod_produto','qtd_prod_compra',
    ];

}



