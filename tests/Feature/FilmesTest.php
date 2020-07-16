<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilmesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIncluirFilme()
    {
        /**
        * @description Incluir Filme
        * @author Leandro Sales <leandro.sallesls@hotmail.com>
        */


        $filme = $this->postJson('/api/filmes', [
            'nome_filme'            => 'Exterminador do Futuro',
            'classificacao'         => '16',

        ]);

        $filme
            ->assertStatus(200)
            ->assertJson([
                'error' => ''
            ]);
    }

    public function testListarFilme()
    {
        /**
        * @description listar Filme
        * @author Leandro Sales <leandro.sallesls@hotmail.com>
        */


        $filme = $this->getJson('/api/filmes');

        $filme
            ->assertStatus(200)
            ->assertJson([
                'error' => ''
            ]);
    }
}
