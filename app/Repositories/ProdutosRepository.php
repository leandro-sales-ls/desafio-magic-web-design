<?php

namespace App\Repositories;

use App\Produtos;

class ProdutosRepository
{

	public function findAll()
	{
        return  Produtos::all();
	}

    public function find($id)
	{
		return Produtos::where('id', $id)->get();
    }

}
