<?php

    class Usuario {
        private $idUsuario;
        private $login;
        private $senha;
        private $idTipoUsuario;
        
        function getIdUsuario(){
            return $this->idUsuario;
        }
        
        function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }
        
        function getLogin(){
            return $this->login;
        }
        
        function setLogin($login){
            $this->login = $login;
        }
        
        function getSenha(){
            return $this->senha;
        }
        
        function setSenha($senha){
            $this->senha = $senha;
        }
        
        function getIdTipoUsuario(){
            return $this->idTipoUsuario;
        }
        
        function setIdTipoUsuario($idTipoUsuario){
            $this->idTipoUsuario = $idTipoUsuario;
        }
    }

?>