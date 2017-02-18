<?php

/*
 * DESCRIÇÃO: Classe de conexão e manipulação do Banco de Dados - USUARIOS
 * FONTE: Curso B7WEB - phpdozeroaoprofissional.com.br
 * DATA: 04/02/2017
 * @author Getulio Vinicius <getuliovinits@gmail.com>
 */

class Usuario {

    // Metodos privados >>>
    private $dbConnect;
    private $queryNumRows;
	private $queryResult;
    // Atributos dos usuarios
    private $usuarioId;
    private $usuarioNome;
    private $usuarioEmail;
    private $usuarioSenha;
    // Metodos privados <<<

    // Metodo Construtor >>>
    public function __construct() {
	    // Constroi a conexao com o banco de dados
        try {
			$this->dbConnect = new PDO("mysql:dbname=classe_usuarios;host=localhost", "gerente_app", "G3r3nt3_4pp");
		} catch(PDOException $error) {
			echo "<strong>The connection failed: </strong>" . $error->getMessage();
	    }
	}
    // Metodo Construtor <<<

    // Metodos publicos >>>

    // Lista todos os registros >>>
    public function queryListAll() {
        // Consulta o banco - PDOStatement
        $sql = "SELECT usuarioId, usuarioNome, usuarioEmail FROM usuarios";
        $sql = $this->dbConnect->prepare($sql);
		$sql->execute();
        // Resultados
        $this->queryNumRows = $sql->rowCount();
		$this->queryResult = $sql->fetchAll();
	}
    // Lista todos os registros <<<

    // Seleciona um registro pela ID >>>
    public function querySelectById($usuarioId) {
        // Consulta o banco - PDOStatement
        $sql = "SELECT * FROM usuarios WHERE usuarioId = ?";
        $sql = $this->dbConnect->prepare($sql);
        $sql->execute(array($usuarioId));
        // Resultados
        if ($sql->rowCount() == 1) {
            $usuario = $sql->fetch();
            $this->usuarioId = $usuario['usuarioId'];
            $this->usuarioNome = $usuario['usuarioNome'];
            $this->usuarioEmail = $usuario['usuarioEmail'];
            $this->usuarioSenha = $usuario['usuarioSenha'];
        }
	}
    // Seleciona um registro pela ID <<<

    // Insere um registo no banco >>>
    public function queryInsert() {
        // Atualiza o registro no banco de dados
        $sql = "INSERT INTO usuarios SET usuarioNome = ?, usuarioEmail = ?, usuarioSenha = ?";
        $sql = $this->dbConnect->prepare($sql);
        $sql->execute(array($this->usuarioNome, $this->usuarioEmail, $this->usuarioSenha));
    }
    // Insere um registro no banco <<<

    // Atualiza um registo no banco >>>
    public function queryUpadte($usuarioId) {
        $sql = "UPDATE usuarios SET usuarioNome = ?, usuarioEmail = ?, usuarioSenha = ? WHERE usuarioId = ?";
        $sql = $this->dbConnect->prepare($sql);
        $sql->execute(array($this->usuarioNome, $this->usuarioEmail, $this->usuarioSenha, $usuarioId));
    }
    // Atualiza um registo no banco >>>

    // Exclui um registo no banco >>>
    public function queryDelete($usuarioId) {
        $sql = "DELETE FROM usuarios WHERE usuarioId = ?";
		$sql = $this->dbConnect->prepare($sql);
		$sql->bindValue(1, $usuarioId);
		$sql->execute();
	}
    // Exclui um registo no banco >>>

    // Retorna a quantidade de registros obtidos em uma consulta >>>
    public function queryNumRows() {
		return $this->queryNumRows;
	}
    // Retorna a quantidade de registros obtidos em uma consulta <<<

    // Retorna os registros obtidos na consulta >>>
    public function queryResult() {
		return $this->queryResult;
	}
    // Retorna os registros obtidos na consulta <<<

    // Retorna a ID do usuario >>>
    public function getUsuarioId() {
        return $this->usuarioId;
    }
    // Retorna a ID do usuario <<<

    // Retorna a Nome do usuario >>>
    public function getUsuarioNome() {
        return $this->usuarioNome;
    }
    // Retorna a Nome do usuario <<<

    // Retorna a E-mail do usuario >>>
    public function getUsuarioEmail() {
        return $this->usuarioEmail;
    }
    // Retorna a E-mail do usuario <<<

    // Configura o Nome do usuario >>>
    public function setUsuarioNome($usuarioNome) {
        $this->usuarioNome = $usuarioNome;
    }
    // Configura o Nome do usuario <<<

    // Configura o E-mail do usuario >>>
    public function setUsuarioEmail($usuarioEmail) {
        $this->usuarioEmail = $usuarioEmail;
    }
    // Configura o E-mail do usuario <<<

    // Configura a Senha do usuario >>>
    public function setUsuarioSenha($usuarioSenha) {
        $this->usuarioSenha = md5($usuarioSenha);
    }
    // Configura a Senha do usuario <<<

// Metodos publicos <<<
}

?>
