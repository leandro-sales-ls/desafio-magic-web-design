<?php

namespace App\Repositories;

use App\Compras;

class ComprasRepository
{

	public function findAll()
	{
        return  Compras::all();
	}

    public function find($id)
	{
		return Compras::where('id', $id)->get();
    }
}
