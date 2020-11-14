<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Repositories\ProdutosRepository;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repository = new ProdutosRepository;
        $produtos = $repository->findAll();
        return $produtos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $error = "";
            $produtos = "";
            $data = $request->all();
            $msg = $this->validacaoCampos($data);

            if (!empty($msg)) {
                $error=$msg;
            } else {
                $produtos = new Produtos;
                $produtos->fill($data);
                $produtos->save();
            }
        } catch(\Exception $e) {
            $error='Erro ao salvar o Produto' . $e;
        }
        return response()->json([
            'error' => $error,
            'data'  => $produtos
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repository = new ProdutosRepository;
        $produtos = $repository->find($id);
        return $produtos;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $error = "";
        $data = $request->all();
        $produto = "";
        $msg = $this->validacaoCampos($data);

        if (!empty($msg)) {
            $error=$msg;
        } else {
            $produto = Produtos::find($id);
            try {
                $produto->update($data);
            }catch(\Exception $e){
                $error='Erro ao atualizar o produto ' . $e;
            }
        }
        return response()->json([
            'error' => $error,
            'data'  => $produto
        ]);
    }

}
