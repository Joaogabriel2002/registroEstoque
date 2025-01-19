<?php

class Conexao {
    private $dbname = "estoque";
    private $user = "root";
    private $password = "";
    private $host = "localhost";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo json_encode(['descricao' => 'Erro de conexão: ' . $e->getMessage()]);
            exit;
        }
    }
}

