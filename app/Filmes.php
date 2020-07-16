<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filmes extends Model
{
    protected $connection = 'mysql';
    protected $table = 'filmes';
    protected $primaryKey = 'id';

    const CREATED_AT = 'data_inclusao';
    const UPDATED_AT = 'data_ult_alteracao';

    protected $fillable = [
        'nome_filme','classificacao',
    ];

    // public function filmesAtores()
    // {
    //     return $this->hasMany(FilmesAtores::class,'id_filme');
    // }
    // public function filmesDiretor()
    // {
    //     return $this->hasMany(filmesDiretor::class,'id_filme');
    // }

}



