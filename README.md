classe-usuarios-php
===================

Classe para manipulação de usuários de uma aplicação no banco de dados MySQL com PHP.

## Requisitos:

+ Web Server: Apache 2.4.x ou superior;
+ Linguagem: PHP 5.6.x ou superior;
+ Banco de dados: MySQL Server 5.7.x ou superior

## Instalação:

Descompactar os arquivo na raiz de um _virtualHost_. A estrutura ficará parecida com:

``` sh
/delete.php
/index.php
/insert.php
/LICENSE
/README.md
/selectbyid.php
/update.php
/Usuarios.php
```

Onde `/` é a raiz do seu _virtualHost_
Execute/Importe o arquivo classe_usuarios.sql no banco de dados _Mysql_. Por exemplo utilizando o _phpMyAdmin_.
Altere o trecho de código que cria a conexão da aplicação com o servidor Mysql de acordo com a sua instalação.

``` php
public function __construct() {
    try {
       $this->dbConnect = new PDO("mysql:dbname=classe_usuarios;host=localhost", "usuario-banco-de-dados", "senha");
    } catch(PDOException $error) {
        echo "<strong>The connection failed: </strong>" . $error->getMessage();
    }
}
```

## Fonte:

Esta classe foi criada a partir da demostração feita pelo professor Bonieky Lacerda no curso de PHP do site [phpdozeroaoprofissional.com.br](http://www.phpdozeroaoprofissional.com.br). Ela foi adaptada para necessidades especificas e resolvi disponibilizar pois gastei algumas boas horas trabalhando nela como processo de aprendizagem.

## Licença:

[GNU GENERAL PUBLIC LICENSE - Version 3, 29 June 2007](https://github.com/getuliovinicius/classe-usuarios-php/blob/master/LICENSE).
