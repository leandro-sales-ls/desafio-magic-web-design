<?php

namespace App\Repositories;

use App\Filmes;

class FilmesRepository
{

	public function findAll()
	{
        return  Filmes::all();
	}

    public function find($id)
	{
		return Filmes::where('id', $id)->get();
    }

    public function filmeAtor($id)
	{
        $model = new Filmes();

        $model = $model->newQuery()->select(
            'filmes.id','filmes.nome_filme','filmes.classificacao',
            'atores.nome_ator'
        )
            ->join('filmes_atores', 'filmes_atores.id_filme', '=', 'filmes.id')
            ->join('atores', 'atores.id', '=', 'filmes_atores.id_atores')
            ->where('filmes.id', $id);

        return $model->get();

    }
    public function filmeDiretor($id){

        $model = new Filmes();

        $model = $model->newQuery()->select(
            'filmes.id', 'diretor.nome_diretor'
        )
            ->join('filmes_diretor', 'filmes_diretor.id_filme', '=', 'filmes.id')
            ->join('diretor', 'diretor.id', '=', 'filmes_diretor.id_diretor')
            ->where('filmes.id', $id);

        return $model->get();

    }
}
