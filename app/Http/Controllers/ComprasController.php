<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compras;
use App\Repositories\ComprasRepository;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repository = new ComprasRepository;
        $compras = $repository->findAll();
        return $compras;
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
            $compras = "";
            $data = $request->all();
            $msg = $this->validacaoCampos($data);
            if (!empty($msg)) {
                $error=$msg;
            } else {
                $compras = new Compras;
                $compras->fill($data);
                $compras->save();
            }
        } catch(\Exception $e) {
            $error='Erro ao salvar Filme' . $e;
        }
        return response()->json([
            'error' => $error,
            'data'  => $compras
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
        $repository = new ComprasRepository;
        $compras = $repository->find($id);
        return $compras;
    }

}
