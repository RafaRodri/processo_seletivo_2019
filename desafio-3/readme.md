<h1>**Desafio 3**</h1>

#### Projeto desenvolvido com Laravel.

##### CRUD
* Criação da tabela foi realizada por meio de migrations.
* Os primeiros registros foram adicionados por meio de seeds.


##### Desenvolvimento de uma API
* Os dados também poderão ser acessados por meio de uma API desenvolvida.
* A ação requisitada pelo consumidor da API, deve ser feita por meio de verbos HTTP.


Método | Endpoint | Ação | Exemplo |
| --- | --- | --- | --- |
| GET | /usuarios | Retorna todos os usuários |  `http://localhost:8000/api/usuarios` |
| GET | /usuarios/{id} | Retorna usuário específico |  `http://localhost:8000/api/usuarios/1` |
| POST | /usuarios | Inesre novo usuário |  `http://localhost:8000/api/usuarios` |
| PUT | /usuarios/{id} | Atualiza dados de um usuário |  `http://localhost:8000/api/usuarios/1` |
| DELETE | /usuarios/{id} | Deleta um usuário |  `http://localhost:8000/api/usuarios/1` |

<br>

###### API em funcionamento:
<img src="public/desafio-3-3.png">
<br>
<img src="public/desafio-3-4.png">
<br>

#### Desenvolvimento front-end
* Com HTML e CSS, foram desenvolvidas telas, para facilitar uma interação do usuário com a base de dados.

###### Imagens front-end:
<img src="public/desafio-3-1.png">
<br>
<img src="public/desafio-3-2.png">
<br><br>

## Para executar projeto:
* Execute o comando `$ composer.install`
* Configure o arquivo `.env`
    * Crie um database (com o nome definido no passo anterior)
* Execute o comando `php artisan migrate --seed`
