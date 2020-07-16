<?php

namespace App\Repositories;

use App\FilmesAtores;

class FilmesAtoresRepository
{

	public function findAll()
	{
        return  FilmesAtores::all();
	}

    public function find($id)
	{
		return FilmesAtores::where('id', $id)->get();
    }
}
