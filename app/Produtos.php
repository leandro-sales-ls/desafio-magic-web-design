<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo','nome','descricao','vlr_venda','link',
    ];

}



