<?php

/*
 * DESCRIÇÃO: Sisteminha CRUD Orientado a Objeto - USUARIOS
 * FONTE: Curso B7WEB - phpdozeroaoprofissional.com.br 
 * DATA: 04/02/2017
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */

// Testa o envio do formulario >>>
if (isset($_POST['usuarioNome']) && empty($_POST['usuarioEmail']) == false) {
    $usuarioNome = addslashes($_POST['usuarioNome']);
    $usuarioEmail = addslashes($_POST['usuarioEmail']);
    $usuarioSenha = addslashes($_POST['usuarioSenha']);
    // Conecta o banco de dados
    require 'Usuarios.php';
    $query = new Usuario();
    // Insere o registro no banco
    $query->setUsuarioNome($usuarioNome);
    $query->setUsuarioEmail($usuarioEmail);
    $query->setUsuarioSenha($usuarioSenha);
    $query->queryInsert();
    // Retorna para a pagina inicial
    header("Location: /");
}
// Testa o envio do formulario <<<

?>

<h1>Classe de Usuário - CRUD</h1>
<pre>
    <a href="/"><<< Voltar</a>
</pre>

<hr>

<h2>Cadastrar usuário</h2>
<form method="POST">
	Nome:<br>
	<input type="text" name="usuarioNome"><br><br>
	E-mail:<br>
	<input type="text" name="usuarioEmail"><br><br>
	Senha:<br>
	<input type="password" name="usuarioSenha"><br><br>
	<input type="submit" name="cadastrar" value="Cadastrar">
</form>
