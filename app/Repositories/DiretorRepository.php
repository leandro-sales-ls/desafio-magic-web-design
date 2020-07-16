<?php

namespace App\Repositories;

use App\Diretor;

class DiretorRepository
{

	public function findAll()
	{
        return  Diretor::all();
	}

    public function find($id)
	{
		return Diretor::where('id', $id)->get();
    }

}
