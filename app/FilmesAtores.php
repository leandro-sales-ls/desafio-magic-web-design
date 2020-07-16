<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmesAtores extends Model
{
    protected $connection = 'mysql';
    protected $table = 'filmes_atores';
    protected $primaryKey = 'id';

    const CREATED_AT = 'data_inclusao';
    const UPDATED_AT = 'data_ult_alteracao';

    protected $fillable = [
        'id_filme','id_atores',
    ];

}



