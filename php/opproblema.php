<?php
require_once "Conexao.php";

class OpProblema extends Conexao {
    private $idProblema;
    private $dtAbertura;
    private $nrOp;
    private $descricao;
    private $usuario_id;
    private $itens_idItem;

    // Getters e Setters
    public function setIdProblema($idProblema) {
        $this->idProblema = $idProblema;
    }

    public function getIdProblema() {
        return $this->idProblema;
    }

    public function setDtAbertura($dtAbertura) {
        $this->dtAbertura = $dtAbertura;
    }

    public function getDtAbertura() {
        return $this->dtAbertura;
    }

    public function setNrOp($nrOp) {
        $this->nrOp = $nrOp;
    }

    public function getNrOp() {
        return $this->nrOp;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function setItens_idItem($itens_idItem) {
        $this->itens_idItem = $itens_idItem;
    }

    public function getItens_idItem() {
        return $this->itens_idItem;
    }

    // Método para abrir solicitação
    public function abrirSolicitacao() {
        $sql = "INSERT INTO opproblema (nrOp, descricao, usuario_id, itens_IdItem)
                VALUES (:nrOp, :descricao, :usuario_id, :itens_idItem)";
        $stmt = $this->conn->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':nrOp', $this->nrOp);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        $stmt->bindParam(':itens_idItem', $this->itens_idItem);
        return $stmt->execute();
    }
}
