<?php

/*
 * DESCRIÇÃO: Sisteminha CRUD Orientado a Objeto - USUARIOS
 * FONTE: Curso B7WEB - phpdozeroaoprofissional.com.br 
 * DATA: 04/02/2017
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */

// Testa a passagem do parametro de identificacao do registro >>>
if(isset($_GET['usuarioId']) && empty($_GET['usuarioId']) == false) {
	$usuarioId = addslashes($_GET['usuarioId']);
} else {
    header("Location: /");
}
// Testa a passagem do parametro de identificacao do registro <<<

// Conecta o banco de dados >>>
require 'Usuarios.php';
$query = new Usuario();
// Conecta o banco de dados <<<

// Testa o envio do formulario >>>
if(isset($_POST['usuarioNome']) && empty($_POST['usuarioEmail']) == false) {
	$usuarioNome = addslashes($_POST['usuarioNome']);
    $usuarioEmail = addslashes($_POST['usuarioEmail']);
    $usuarioSenha = addslashes($_POST['usuarioSenha']);
	// Atualiza o registro no banco de dados
    $query->setUsuarioNome($usuarioNome);
    $query->setUsuarioEmail($usuarioEmail);
    $query->setUsuarioSenha($usuarioSenha);
    $query->queryUpadte($usuarioId);
	// Retorna para a pagina inicial
	header("Location: /");
} else {
    // Seleciona o registro no banco de dados
    $query->querySelectById($usuarioId);
}
// Testa o envio do formulario <<<

?>

<h1>Classe de Usuário - CRUD</h1>
<pre><a href="/"><<< Voltar</a></pre>
<hr>

<h1>Editar usuário</h1>

<form method="POST">
	Nome:<br>
	<input type="text" name="usuarioNome" value="<?php echo $query->getUsuarioNome(); ?>"><br><br>
	E-mail:<br>
	<input type="text" name="usuarioEmail" value="<?php echo $query->getUsuarioEmail(); ?>"><br><br>
    Senha:<br>
	<input type="password" name="usuarioSenha"><br><br>
	<input type="submit" name="atualizar" value="Atualizar">
</form>
