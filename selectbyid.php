<?php

/*
 * DESCRIÇÃO: Sisteminha CRUD Orientado a Objeto - USUARIOS
 * FONTE: Curso B7WEB - phpdozeroaoprofissional.com.br 
 * DATA: 03/02/2017
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */

// Testa o envio do formulario >>>
if (isset($_POST['usuarioId'])) {
    $usuarioId = addslashes($_POST['usuarioId']);
    // Conecta o banco de dados
    require 'Usuarios.php';
    $query = new Usuario();
    // Seleciona o registro no banco de dados
    $query->querySelectById($usuarioId);
    $pesquisa = 1;
}
// Testa o envio do formulario <<<

?>

<h1>Classe de Usuário - CRUD</h1>

<form method="POST">
	Id:<br/>
	<input type="text" name="usuarioId"><br/><br/>
	<input type="submit" name= "localizar" value="Localizar">
</form>

<hr>

<?php

if (isset($pesquisa)) {
    echo '<h2>' . $query->getUsuarioNome() . '</h2>';
    echo '<p>' . $query->getUsuarioEmail() . '</p>';
    echo '<pre><a href="update.php?usuarioId=' . $query->getUsuarioId() . '">Editar</a> - <a href="delete.php?usuarioId=' . $query->getUsuarioId() . '">Excluir</a></pre>';
}

?>

<hr>

<pre>
	<a href="/"><<< Voltar</a>
</pre>
