<?php

    require_once "Conexao.php";

    class Reabertura extends Conexao{

        private $idReabertura;
        private $nrOp;
        private $motivo;
        private $descricao;
        private $usuario_id;

        public function setIdReabertura($idReabertura){
            $this->idReabertura=$idReabertura;
        }

        public function getIdReabertura(){
            return $this->idReabertura;
        }

        public function setNrOp($nrOp){
            $this->nrOp=$nrOp;
        }

        public function getNrOp(){
            return $this->nrOp;
        }

        public function setMotivo($motivo){
            $this->motivo=$motivo;
        }

        public function getMotivo (){
            return $this->motivo;
        }

        public function setDescricao($descricao){
            $this->descricao=$descricao;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setUsuario_Id($usuario_id){
            $this->usuario_id=$usuario_id;
        }

        public function getUsuario_Id(){
            return $this->usuario_id;
        }


        public function solicitarReabertura(){
            $sql="INSERT INTO reaberturaop (nrOp,motivo,descricao,usuario_id) 
            VALUES (:nrOp,:motivo,:descricao,:usuario_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam('nrOp',$this->nrOp);
            $stmt->bindParam('motivo',$this->motivo);
            $stmt->bindParam('descricao',$this->descricao);
            $stmt->bindParam('usuario_id',$this->usuario_id);
            if($stmt->execute()){
                return $this->conn->lastInsertId();
            }else{
                return false;
            }
    
            return $stmt->execute();
    
        }
    }
?>