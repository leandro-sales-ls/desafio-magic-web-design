<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filmes;
use App\Repositories\FilmesRepository;
use Illuminate\Support\Facades\DB;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repository = new FilmesRepository;
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

                $filmes = new Filmes;
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
        $repository = new FilmesRepository;
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

            $filme = Filmes::find($id);

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

            $repository = new FilmesRepository;
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
        if (empty($data['nome_filme'])){
            return "É necessario informa o nome do Filme";
        }

        if (empty($data['classificacao'])){
            return "É necessario informa a classificação do Filme";
        }

    }
    public function filmeAtorDiretor()
    {
        $filme = [];
        $nome_ator = [];
        $nome_diretor = [];
        $nome_filme = [];
        $classificacao = [];

        $repository = new FilmesRepository;

        $filmes = $repository->findAll();

       foreach($filmes as $item) {

            $filme[] = [
                'id' =>             $item->id,
                'nome_filme' =>     $item->nome_filme,
                'classificacao'=>   $item->classificacao,
                'nome_ator'=>       $this->buscarAtores($item->id),
                'nome_diretor'=>    $this->buscarDiretor($item->id),
            ];

        }

        return  $filme;
    }

    public function buscarAtores($id)
    {
        $repository = new FilmesRepository;
        $filmeAtor = $repository->filmeAtor($id);

        $nome_ator = [];

        foreach($filmeAtor as $item) {

            $nome_ator[] = $item->nome_ator;

        }

        return $nome_ator;
    }

    public function buscarDiretor($id)
    {
        $repository = new FilmesRepository;
        $filmeDiretor = $repository->filmeDiretor($id);

        $nome_diretor = [];

        foreach($filmeDiretor as $item) {

            $nome_diretor[] = $item->nome_diretor;

        }
        return $nome_diretor;

    }
}
