<?php

namespace App\Repositories;

use App\Vendas;

class VendasRepository
{

	public function findAll()
	{
        return  Vendas::all();
	}

    public function find($id)
	{
		return Vendas::where('id', $id)->get();
    }

}
