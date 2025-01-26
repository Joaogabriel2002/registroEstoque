<?php
require_once 'Conexao.php';

class AjusteEstoque extends Conexao {

    private $idSolicitacao;
    private $qtdContagem;
    private $dtAbertura;
    private $lote;
    private $usuario_id;
    private $idItem;
    private $descricaoItem;
    private $possuiLote;

    public function setIdSolicitacao($idSolicitacao) {
        $this->idSolicitacao = $idSolicitacao;
    }

    public function getIdSolicitacao() {
        return $this->idSolicitacao;
    }

    public function setQtdContagem($qtdContagem) {
        $this->qtdContagem = $qtdContagem;
    }

    public function getQtdContagem() {
        return $this->qtdContagem;
    }

    public function setDtAbertura($dtAbertura) {
        $this->dtAbertura = $dtAbertura;
    }

    public function getDtAbertura() {
        return $this->dtAbertura;
    }

    public function setLote($lote) {
        $this->lote = $lote;
    }

    public function getLote() {
        return $this->lote;
    }

    public function setIdItem($idItem) {
        $this->idItem = $idItem;
    }

    public function getIdItem() {
        return $this->idItem;
    }

    public function setDescricaoItem($descricaoItem) {
        $this->descricaoItem = $descricaoItem;
    }

    public function getDescricaoItem() {
        return $this->descricaoItem;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id; // Corrigido
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function setPossuiLote($possuiLote) {
        $this->possuiLote = $possuiLote; // Corrigido
    }

    public function getPossuiLote() {
        return $this->possuiLote;
    }

    public function abrirAjuste() {
        // A consulta SQL está corrigida
        $sql = "INSERT INTO ajusteestoque (qtdContagem, lote, usuario_id, itens_idItem, possuilote) 
                VALUES (:qtdContagem, :lote, :usuario_id, :idItem, :possuiLote)";

        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindParam(':qtdContagem', $this->qtdContagem);
        $stmt->bindParam(':lote', $this->lote);
        $stmt->bindParam(':usuario_id', $this->usuario_id);
        $stmt->bindParam(':idItem', $this->idItem);
        $stmt->bindParam(':possuiLote', $this->possuiLote);
        if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return false;
        }

        return $stmt->execute(); // Retorna true ou false
    }
}
