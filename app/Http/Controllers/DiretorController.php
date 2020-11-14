<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendas;
use App\Repositories\VendasRepository;

class DiretorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repository = new VendasRepository;
        $vendas = $repository->findAll();
        return $vendas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $error = "";
            $venda = "";
            $data = $request->all();
            $msg = $this->validacaoCampos($data);
            if (!empty($msg)) {
                $error=$msg;
            } else {
                $venda = new Vendas;
                $venda->fill($data);
                $venda->save();
            }
        } catch(\Exception $e) {
            $error='Erro ao salvar Filme' . $e;
        }
        return response()->json([
            'error' => $error,
            'data'  => $venda
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
        $repository = new VendasRepository;
        $venda = $repository->find($id);
        return $venda;
    }


}
