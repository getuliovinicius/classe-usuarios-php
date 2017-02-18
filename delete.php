<?php
/*
 * DESCRIÇÃO: Sisteminha CRUD Orientado a Objeto - USUARIOS
 * FONTE: Curso B7WEB - phpdozeroaoprofissional.com.br
 * DATA: 04/02/2016
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */

// Testa a passagem do parametro de identificacao do registro >>>
if(isset($_GET['usuarioId']) && empty($_GET['usuarioId']) == false) {
	$usuarioId = addslashes($_GET['usuarioId']);
    // Conecta o banco de dados
    require 'Usuarios.php';
    $query = new Usuario();
	// Exclui o registro do banco de dados
    $query->queryDelete($usuarioId);
	// Retorna para a pagiana incial apos a exclusao
	header("Location: /");
} else {
	// Retorna para a pagiana incial sem excluir
	header("Location: /");
}
// Testa a passagem do parametro de identificacao do registro <<<

?>
