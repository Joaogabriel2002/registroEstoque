<?php

require_once 'Conexao.php';

class Usuario extends Conexao{

    private $id;
    private $nomeUsuario;
    private $setor;

    public function setId($id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNomeUsuario($nomeUsuario){
        $this->nomeUsuario=$nomeUsuario;
    }

    public function getNomeUsuario(){
        return $this->nomeUsuario;
    }

    public function setSetor($setor){
        $this->setor=$setor;
    }

    public function getSetor(){
        return $this->setor;
    }
    

    public function consultarUsuarios() {  
        $conn = $this->getConn(); 
        $sql = "SELECT id, nomeUsuario FROM usuario"; 
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}

?>