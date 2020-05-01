<?php

    class Escola{
    
        private $idEscola;
        private $nome;
        private $logradouro;
        private $numero;
        private $bairro;
        private $cidade;
        private $estado;
        private $cep;
        private $telefones; //lista
        private $usuario; //objeto
        
        function getIdEscola(){
            return $this->idEscola;
        }
        
        function setIdEscola($idEscola){
            $this->idEscola = $idEscola;
        }
        
        function getNome(){
            return $this->nome;
        }
        
        function setNome($nome){
            $this->nome = $nome;
        }
        
        function getLogradouro(){
            return $this->logradouro;
        }
        
        function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }
        
        function getNumero(){
            return $this->numero;
        }
        
        function setNumero($numero){
            $this->numero = $numero;
        }
        
        function getBairro(){
            return $this->bairro;
        }
        
        function setBairro($bairro){
            $this->bairro = $bairro;
        }
        
        function getCidade(){
            return $this->cidade;
        }
        
        function setCidade($cidade){
            $this->cidade = $cidade;
        }
        
        function getEstado(){
            return $this->estado;
        }
        
        function setEstado($estado){
            $this->estado = $estado;
        }
        
        function getCep(){
            return $this->cep;
        }
        
        function setCep($cep){
            $this->cep = $cep;
        }
        
        function getTelefones(){
            return $this->telefones;
        }
        
        function setTelefones($telefones){
            $this->telefones = $telefones;
        }
        
        function getUsuario(){
            return $this->usuario;
        }
        
        function setUsuario($usuario){
            $this->usuario = $usuario;
        }
    
    }

?>