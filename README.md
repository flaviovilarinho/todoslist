<p align="center">
    <h1 align="center">TODOS.List</h1>
</p>

Após colocar a aplicação no servidor, deverá ser executado o comando:
`composer install`

Deverá ser criada uma base de dados com o nome `linkya`. e executar o ficheiro SQL presente na raiz do projeto, com o nome `dump.sql.sql`.
Caso opte por um nome diferente e/ou caso as credenciais de autenticação À base de dados seja diferente de `username: root; password: `, então terá de alterar a configuração da base de dados em `/common/config/main-local.php`.

Database Model:
[[https://github.com/flaviovilarinho/todoslist/dbmodel.png|alt=dbmodel]]
