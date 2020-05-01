<?php

    class Turma{
        
        private $idTurma;
        private $descricao;
        private $escola; //objeto
        
        function getIdTurma(){
            return $this->idTurma;
        }
        
        function setIdTurma($idTurma){
            $this->idTurma = $idTurma;
        }
        
        function getDescricao(){
            return $this->descricao;
        }
        
        function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        
        function getEscola(){
            return $this->escola;
        }
        
        function setEscola($escola){
            $this->escola = $escola;
        }
        
    }

?>