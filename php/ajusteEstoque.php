<?php
    require_once 'Conexao.php';

    class AjusteEstoque extends Conexao{

        private idSolicitacao;
        private qtdContagem;
        private dtAbertura;
        private lote;
        private usuario_id;
        private idItem;
        private descricaoItem;

        public function setIdSolicitacao($idSolicitacao){
            $this->idSolicitacao=$idSolicitacao;
        }

        public function getIdSolicitacao(){
            return $this->idSolicitacao;
        }

        public function setQtdContagem($qtdContagem){
            $this->qtdContagem=$qtdContagem;
        }

        public function getQtdContagem(){
            return $this->qtdContagem;
        }

        public function setDtAbertura($dtAbertura){
            $this->dtAbertura=$dtAbertura;
        }

        public function getDtAbertura(){
            return $this->dtAbertura;
        }

        public function setLote($lote){
            $this->lote=$lote;
        }

        public function getLote(){
            return $this->lote;
        }

        public function setIdItem($idItem){
            $this->idItem=$idItem;
        }

        public function getIdItem(){
            return $this->idItem;
        }

        public function setDescricaoItem($descricaoItem){
            $this->descricaoItem=$descricaoItem;
        }

        public function getDescricaoItem(){
            return $this->descricaoItem;
        }

        // public function abrirAjuste(){
        //     $sql="INSERT INTO ajusteestoque (qtdContagem,lote,usuario_id,itens_idItem) VALUE (,,,)";
        //     $stmt=$this->conn->prepare($sql);
        //     $stmt->bindParam();
        // }
    }