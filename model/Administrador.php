<?php
    
    class Administrador{
        
        private $idAdministrador;
        private $nome;
        private $foto;
        private $usuario; //objeto
        
        function getIdAdministrador(){
            return $this->idAdministrador;
        }
        
        function setIdAdministrador($idAdministrador){
            $this->idAdministrador = $idAdministrador;
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
        
    }

?>