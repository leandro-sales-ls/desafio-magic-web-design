<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diretor extends Model
{
    protected $connection = 'mysql';
    protected $table = 'diretor';
    protected $primaryKey = 'id';

    const CREATED_AT = 'data_inclusao';
    const UPDATED_AT = 'data_ult_alteracao';

    protected $fillable = [
        'nome_diretor','idade',
    ];

}



