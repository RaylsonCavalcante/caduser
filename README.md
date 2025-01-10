

<h1>CadUser<h1>

<h3>SOBRE:</h3>

Olá!
Aqui está o projeto de Cadastro de Usuários.
<br>
FUNÇÕES:
* Cadastro de Usuário
* Listar os Usuários
* Editar Usuário
* Excluir Usuário
<br>

<h3>LINGUAGENS E FERRAMENTAS:</h3>
Na criação do sistema utilizei as seguintes linguagens e ferramentas:

* HTML<br>
* CSS<br>
* MDBOOTSTRAP<br>
* PHP<br>
* LARAVEL<br>
* MYSQL

<h3>RODAR:</h3>

1. **Clone o repositório:**

   Abra seu terminal e execute o seguinte comando para clonar o projeto:

   ```bash
   git clone https://github.com/RaylsonCavalcante/caduser.git

   cd nome-do-repositorio

   composer install

   cp .env.example .env

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=usuario_do_banco
   DB_PASSWORD=senha_do_banco

   php artisan key:generate
   
   php artisan migrate

   php artisan serve
