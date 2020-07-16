<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atores;
use App\Repositories\AtoresRepository;
use Illuminate\Support\Facades\DB;

class AtoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repository = new AtoresRepository;
        $filmes = $repository->findAll();
        return  $filmes;
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
            $filmes = "";
            $data = $request->all();

            $msg = $this->validacaoCampos($data);

            if ( !empty($msg) )
            {
                $error=$msg;

            } else {

                $filmes = new Atores;
                $filmes->fill($data);

                $filmes->save();

            }

        }catch(\Exception $e){

            $error='Erro ao salvar Filme' . $e;

        }
        return response()->json([
            'error' => $error,
            'data'  => $filmes
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
        $repository = new AtoresRepository;
        $filmes = $repository->find($id);
        return $filmes;
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
        $filme = "";

        $msg = $this->validacaoCampos($data);

        if ( !empty($msg) )
        {
            $error=$msg;

        } else {

            $filme = Atores::find($id);

            try {
                $filme->update($data);

            }catch(\Exception $e){

                $error='Erro ao atualizar o filme ' . $e;

            }

        }

        return response()->json([
            'error' => $error,
            'data'  => $filme
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $error = "";

            $repository = new AtoresRepository;
            $filme = $repository->find($id);

            if (empty($filme))
            {
                $error = "Filme não encontrado";

            } else {

                try {
                    $filme->each->delete();

                }catch(\Exception $e){
                    $error='Erro ao excluir o Filme' . $e;
                }

            }

        }catch(\Exception $e){

            $error='Erro ao salvar Filme' . $e;

        }
        return response()->json([
            'error' => $error,
            'data'  => $filme
        ]);
    }

    public function validacaoCampos($data)
    {
        if (empty($data['nome_ator'])){
            return "É necessario informa o nome do Ator/Atriz";
        }

        if (empty($data['idade'])){
            return "É necessario informa a idade do Ator/Atriz";
        }

    }
}