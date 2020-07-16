#Desafio da Magic Web Design

#Cadastro de Filme

## Cadastro

-   Filmes.
-   Classificação do Filme
-   Atores
-   Diretor

## Configuração

Abra o cmd e rode o comando: git clone https://github.com/leandro-sales-ls/desafio-magic-web-design.git

Configure o ".env" com as informações do banco que deseja utilizar, informando o DB_CONNECTION, DB_HOST,DB_PORT, DB_DATABASE, DB_USERNAME e DB_PASSWORD.

Rode o comando: composer install

Rode o comando: php artisan migrate

Rode o comando: php artisan serve

Importe o arquivo "Postman Echo.postman_collection.json" no POSTMAN

OBS:

-   Rode as rotas na sequencia.
-   Tive que criar Tabelas de ligação para filme x atores e filmes x diretores pois um diretor pode ser de varios Filmes e um filme pode ter varios diretores, o mesmo com atores.
-   É necessario cadastrar nessas tabelas de ligação, já esta pronto todas as rotas no postman! :)

-   Fiz o teste unitario para rodar basta executar o comando: "./vendor/bin/phpunit", não fiz de todos os controllers.

-   Em caso de duvidas, estarei a disposição!
