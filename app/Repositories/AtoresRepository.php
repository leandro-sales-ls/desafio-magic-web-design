<?php

namespace App\Repositories;

use App\Atores;

class AtoresRepository
{

	public function findAll()
	{
        return  Atores::all();
	}

    public function find($id)
	{
		return Atores::where('id', $id)->get();
    }
}
