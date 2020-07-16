<?php

namespace App\Repositories;

use App\FilmesDiretor;

class FilmesDiretorRepository
{

	public function findAll()
	{
        return  FilmesDiretor::all();
	}

    public function find($id)
	{
		return FilmesDiretor::where('id', $id)->get();
    }
}
