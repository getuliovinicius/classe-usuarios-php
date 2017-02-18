<?php

/*
 * DESCRIÇÃO: Sisteminha CRUD Orientado a Objeto - USUARIOS
 * FONTE: Curso B7WEB - phpdozeroaoprofissional.com.br
 * DATA: 03/02/2017
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */

?>

<h1>Classe de Usuário - CRUD</h1>

<pre>
	<a href="insert.php">Inserir novo usuário</a>

	<a href="selectbyid.php">Localizar usuário</a>
</pre>

<hr>

<?php

// Conecta o banco de dados
require 'Usuarios.php';
$query = new Usuario();
$query->queryListAll();

// Exibe a quantidade de usuarios registrados
echo '<p>Quantidade de usuarios: ' . $query->queryNumRows() . '</p>';
echo '<hr>';

// Exibe a lista de usuarios registrados
if ($query->queryNumRows() > 0) {
    foreach ($query->queryResult() as $usuario) {
    	echo '<h2>' . $usuario['usuarioNome'] . '</h2>';
    	echo '<p>' . $usuario['usuarioEmail'] . '</p>';
    	echo '<pre><a href="update.php?usuarioId=' . $usuario['usuarioId'] . '">Editar</a> - <a href="delete.php?usuarioId=' . $usuario['usuarioId'] . '">Excluir</a></pre>';
    	echo '<hr>';
    }
} else {
	echo 'Não foram localizados registros com base nos filtros estipulados.';
}

?>
