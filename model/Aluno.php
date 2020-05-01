<?php

    class Aluno{
        private $idAluno;
        private $nome;
        private $foto;
        private $usuario; //objeto
        private $ra;
        private $turma; //objeto
        
        function getIdAluno(){
            return $this->idAluno;
        }
        
        function setIdAluno($idAluno){
            $this->idAluno = $idAluno;
        }
        
        function getNome(){
            return $this->nome;
        }
        
        function setNome($nome){
            $this->nome = $nome;
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
        
        function getRa(){
            return $this->ra;
        }
        
        function setRa($ra){
            $this->ra = $ra;
        }
        
        function getTurma(){
            return $this->turma;
        }
        
        function setTurma($turma){
            $this->turma = $turma;
        }
    }

?>