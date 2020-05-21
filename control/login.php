<?php

session_start(); //comeca a sessao pra guardar os dados de quem ta logado

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

if(is_string($resp)){ //se a resposta eh uma string, quer dizer que nao retornou quem ta logado entao ta errado. echo pra mostrar a mensagem de erro
    echo $resp;
}else{
    $_SESSION['logado'] = serialize($resp); //guardar todo o objeto na sessao
    //$logado = unserialize($_SESSION['logado']); <--- quando precisar usar, fazer isso. ai voce tem o objeto de novo na variavel
    echo "Login efetuado com sucesso";
}


?>