<?php

session_start();

include_once "../model/Usuario.php";
include_once "../dao/Usuario.php";

$login = $_POST["txtLogin"];
$senha = $_POST["txtSenha"];
$tipoLogin = $_POST["txtTipo"];

$u = new Usuario();

$u->setLogin($login);
$u->setSenha($senha);
$u->setIdTipoUsuario($tipoLogin);

$resp = realizarLogin($u);

if(is_string($resp)){
    echo $resp;
}else{
    $_SESSION['logado'] = serialize($resp); //guardar todo o objeto na sessao
    //$logado = unserialize($_SESSION['logado']); <--- quando precisar usar, fazer isso. ai voce tem o objeto de novo na variavel
    echo "Login efetuado com sucesso";
}


?>