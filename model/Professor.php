<?php

    class Professor{
        
        private $idProfessor;
        private $nome;
        private $rg;
        private $foto;
        private $usuario; //objeto
        private $turmas; //lista
        
        function getIdProfessor(){
            return $this->idProfessor;
        }
        
        function setIdAluno($idProfessor){
            $this->idProfessor = $idProfessor;
        }
        
        function getNome(){
            return $this->nome;
        }
        
        function setNome($nome){
            $this->nome = $nome;
        }
        
        function getRg(){
            return $this->rg;
        }
        
        function setRg($rg){
            $this->rg = $rg;
        }
        
        function getFoto(){
            return $this->foto;
        }
        
        function setFoto($foto){
            $this->foto = $foto;
        }
        
        function getUsuario(){
            return $this->usuario;
        }
        
        function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        
        function getTurmas(){
            return $this->turmas;
        }
        
        function setTurmas($turmas){
            $this->turmas = $turmas;
        }
        
    }

?>