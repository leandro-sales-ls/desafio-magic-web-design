<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atores extends Model
{
    protected $connection = 'mysql';
    protected $table = 'atores';
    protected $primaryKey = 'id';

    const CREATED_AT = 'data_inclusao';
    const UPDATED_AT = 'data_ult_alteracao';

    protected $fillable = [
        'nome_ator','idade',
    ];

}



